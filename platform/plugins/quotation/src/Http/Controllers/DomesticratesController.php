<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\DomesticratesRequest;
use Botble\Quotation\Repositories\Interfaces\DomesticratesInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\DomesticratesTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\DomesticratesForm;
use Botble\Base\Forms\FormBuilder;

class DomesticratesController extends BaseController
{
    /**
     * @var DomesticratesInterface
     */
    protected $domesticratesRepository;

    /**
     * @param DomesticratesInterface $domesticratesRepository
     */
    public function __construct(DomesticratesInterface $domesticratesRepository)
    {
        $this->domesticratesRepository = $domesticratesRepository;
    }

    /**
     * @param DomesticratesTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(DomesticratesTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::domesticrates.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::domesticrates.create'));

        return $formBuilder->create(DomesticratesForm::class)->renderForm();
    }

    /**
     * @param DomesticratesRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(DomesticratesRequest $request, BaseHttpResponse $response)
    {
        $domesticrates = $this->domesticratesRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(DOMESTICRATES_MODULE_SCREEN_NAME, $request, $domesticrates));

        return $response
            ->setPreviousUrl(route('domesticrates.index'))
            ->setNextUrl(route('domesticrates.edit', $domesticrates->id))
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
        $domesticrates = $this->domesticratesRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $domesticrates));

        page_title()->setTitle(trans('plugins/quotation::domesticrates.edit') . ' "' . $domesticrates->name . '"');

        return $formBuilder->create(DomesticratesForm::class, ['model' => $domesticrates])->renderForm();
    }

    /**
     * @param $id
     * @param DomesticratesRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, DomesticratesRequest $request, BaseHttpResponse $response)
    {
        $domesticrates = $this->domesticratesRepository->findOrFail($id);

        $domesticrates->fill($request->input());

        $this->domesticratesRepository->createOrUpdate($domesticrates);

        event(new UpdatedContentEvent(DOMESTICRATES_MODULE_SCREEN_NAME, $request, $domesticrates));

        return $response
            ->setPreviousUrl(route('domesticrates.index'))
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
            $domesticrates = $this->domesticratesRepository->findOrFail($id);

            $this->domesticratesRepository->delete($domesticrates);

            event(new DeletedContentEvent(DOMESTICRATES_MODULE_SCREEN_NAME, $request, $domesticrates));

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
            $domesticrates = $this->domesticratesRepository->findOrFail($id);
            $this->domesticratesRepository->delete($domesticrates);
            event(new DeletedContentEvent(DOMESTICRATES_MODULE_SCREEN_NAME, $request, $domesticrates));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
