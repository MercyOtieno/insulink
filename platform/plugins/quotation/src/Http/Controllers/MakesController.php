<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\MakesRequest;
use Botble\Quotation\Repositories\Interfaces\MakesInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\MakesTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\MakesForm;
use Botble\Base\Forms\FormBuilder;

class MakesController extends BaseController
{
    /**
     * @var MakesInterface
     */
    protected $makesRepository;

    /**
     * @param MakesInterface $makesRepository
     */
    public function __construct(MakesInterface $makesRepository)
    {
        $this->makesRepository = $makesRepository;
    }

    /**
     * @param MakesTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(MakesTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::makes.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::makes.create'));

        return $formBuilder->create(MakesForm::class)->renderForm();
    }

    /**
     * @param MakesRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(MakesRequest $request, BaseHttpResponse $response)
    {
        $makes = $this->makesRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(MAKES_MODULE_SCREEN_NAME, $request, $makes));

        return $response
            ->setPreviousUrl(route('makes.index'))
            ->setNextUrl(route('makes.edit', $makes->id))
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
        $makes = $this->makesRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $makes));

        page_title()->setTitle(trans('plugins/quotation::makes.edit') . ' "' . $makes->name . '"');

        return $formBuilder->create(MakesForm::class, ['model' => $makes])->renderForm();
    }

    /**
     * @param $id
     * @param MakesRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, MakesRequest $request, BaseHttpResponse $response)
    {
        $makes = $this->makesRepository->findOrFail($id);

        $makes->fill($request->input());

        $this->makesRepository->createOrUpdate($makes);

        event(new UpdatedContentEvent(MAKES_MODULE_SCREEN_NAME, $request, $makes));

        return $response
            ->setPreviousUrl(route('makes.index'))
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
            $makes = $this->makesRepository->findOrFail($id);

            $this->makesRepository->delete($makes);

            event(new DeletedContentEvent(MAKES_MODULE_SCREEN_NAME, $request, $makes));

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
            $makes = $this->makesRepository->findOrFail($id);
            $this->makesRepository->delete($makes);
            event(new DeletedContentEvent(MAKES_MODULE_SCREEN_NAME, $request, $makes));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
