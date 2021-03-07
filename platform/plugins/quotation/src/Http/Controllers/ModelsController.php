<?php

namespace Botble\Quotation\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Botble\Base\Forms\FormBuilder;
use Botble\Quotation\Models\Models;
use Botble\Quotation\Forms\ModelsForm;
use Botble\Quotation\Tables\ModelsTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Http\Requests\ModelsRequest;
use Botble\Quotation\Repositories\Interfaces\ModelsInterface;

class ModelsController extends BaseController
{
    /**
     * @var ModelsInterface
     */
    protected $modelsRepository;

    /**
     * @param ModelsInterface $modelsRepository
     */
    public function __construct(ModelsInterface $modelsRepository)
    {
        $this->modelsRepository = $modelsRepository;
    }

    /**
     * @param ModelsTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        page_title()->setTitle(trans('plugins/quotation::models.name'));
        $makes = Models::with('makes')->get();
        return view('plugins/quotation::makesmodel.index', compact('makes'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::models.create'));

        return $formBuilder->create(ModelsForm::class)->renderForm();
    }

    /**
     * @param ModelsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ModelsRequest $request, BaseHttpResponse $response)
    {
        $models = $this->modelsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(MODELS_MODULE_SCREEN_NAME, $request, $models));

        return $response
            ->setPreviousUrl(route('models.index'))
            ->setNextUrl(route('models.edit', $models->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $models = $this->modelsRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $models));

        page_title()->setTitle(trans('plugins/quotation::models.edit') . ' "' . $models->name . '"');

        return $formBuilder->create(ModelsForm::class, ['model' => $models])->renderForm();
    }

    /**
     * @param $id
     * @param ModelsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ModelsRequest $request, BaseHttpResponse $response)
    {
        $models = $this->modelsRepository->findOrFail($id);

        $models->fill($request->input());

        $this->modelsRepository->createOrUpdate($models);

        event(new UpdatedContentEvent(MODELS_MODULE_SCREEN_NAME, $request, $models));

        return $response
            ->setPreviousUrl(route('models.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $models = $this->modelsRepository->findOrFail($id);

            $this->modelsRepository->delete($models);

            event(new DeletedContentEvent(MODELS_MODULE_SCREEN_NAME, $request, $models));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $models = $this->modelsRepository->findOrFail($id);
            $this->modelsRepository->delete($models);
            event(new DeletedContentEvent(MODELS_MODULE_SCREEN_NAME, $request, $models));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
