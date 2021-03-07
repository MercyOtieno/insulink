<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\ThirdpartyratesRequest;
use Botble\Quotation\Repositories\Interfaces\ThirdpartyratesInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\ThirdpartyratesTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\ThirdpartyratesForm;
use Botble\Base\Forms\FormBuilder;

class ThirdpartyratesController extends BaseController
{
    /**
     * @var ThirdpartyratesInterface
     */
    protected $thirdpartyratesRepository;

    /**
     * @param ThirdpartyratesInterface $thirdpartyratesRepository
     */
    public function __construct(ThirdpartyratesInterface $thirdpartyratesRepository)
    {
        $this->thirdpartyratesRepository = $thirdpartyratesRepository;
    }

    /**
     * @param ThirdpartyratesTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ThirdpartyratesTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::thirdpartyrates.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::thirdpartyrates.create'));

        return $formBuilder->create(ThirdpartyratesForm::class)->renderForm();
    }

    /**
     * @param ThirdpartyratesRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ThirdpartyratesRequest $request, BaseHttpResponse $response)
    {
        $thirdpartyrates = $this->thirdpartyratesRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(THIRDPARTYRATES_MODULE_SCREEN_NAME, $request, $thirdpartyrates));

        return $response
            ->setPreviousUrl(route('thirdpartyrates.index'))
            ->setNextUrl(route('thirdpartyrates.edit', $thirdpartyrates->id))
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
        $thirdpartyrates = $this->thirdpartyratesRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $thirdpartyrates));

        page_title()->setTitle(trans('plugins/quotation::thirdpartyrates.edit') . ' "' . $thirdpartyrates->name . '"');

        return $formBuilder->create(ThirdpartyratesForm::class, ['model' => $thirdpartyrates])->renderForm();
    }

    /**
     * @param $id
     * @param ThirdpartyratesRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ThirdpartyratesRequest $request, BaseHttpResponse $response)
    {
        $thirdpartyrates = $this->thirdpartyratesRepository->findOrFail($id);

        $thirdpartyrates->fill($request->input());

        $this->thirdpartyratesRepository->createOrUpdate($thirdpartyrates);

        event(new UpdatedContentEvent(THIRDPARTYRATES_MODULE_SCREEN_NAME, $request, $thirdpartyrates));

        return $response
            ->setPreviousUrl(route('thirdpartyrates.index'))
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
            $thirdpartyrates = $this->thirdpartyratesRepository->findOrFail($id);

            $this->thirdpartyratesRepository->delete($thirdpartyrates);

            event(new DeletedContentEvent(THIRDPARTYRATES_MODULE_SCREEN_NAME, $request, $thirdpartyrates));

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
            $thirdpartyrates = $this->thirdpartyratesRepository->findOrFail($id);
            $this->thirdpartyratesRepository->delete($thirdpartyrates);
            event(new DeletedContentEvent(THIRDPARTYRATES_MODULE_SCREEN_NAME, $request, $thirdpartyrates));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
