<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\CommercialfleetRequest;
use Botble\Quotation\Repositories\Interfaces\CommercialfleetInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\CommercialfleetTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\CommercialfleetForm;
use Botble\Base\Forms\FormBuilder;

class CommercialfleetController extends BaseController
{
    /**
     * @var CommercialfleetInterface
     */
    protected $commercialfleetRepository;

    /**
     * @param CommercialfleetInterface $commercialfleetRepository
     */
    public function __construct(CommercialfleetInterface $commercialfleetRepository)
    {
        $this->commercialfleetRepository = $commercialfleetRepository;
    }

    /**
     * @param CommercialfleetTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CommercialfleetTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::commercialfleet.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::commercialfleet.create'));

        return $formBuilder->create(CommercialfleetForm::class)->renderForm();
    }

    /**
     * @param CommercialfleetRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CommercialfleetRequest $request, BaseHttpResponse $response)
    {
        $commercialfleet = $this->commercialfleetRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(COMMERCIALFLEET_MODULE_SCREEN_NAME, $request, $commercialfleet));

        return $response
            ->setPreviousUrl(route('commercialfleet.index'))
            ->setNextUrl(route('commercialfleet.edit', $commercialfleet->id))
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
        $commercialfleet = $this->commercialfleetRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $commercialfleet));

        page_title()->setTitle(trans('plugins/quotation::commercialfleet.edit') . ' "' . $commercialfleet->name . '"');

        return $formBuilder->create(CommercialfleetForm::class, ['model' => $commercialfleet])->renderForm();
    }

    /**
     * @param $id
     * @param CommercialfleetRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CommercialfleetRequest $request, BaseHttpResponse $response)
    {
        $commercialfleet = $this->commercialfleetRepository->findOrFail($id);

        $commercialfleet->fill($request->input());

        $this->commercialfleetRepository->createOrUpdate($commercialfleet);

        event(new UpdatedContentEvent(COMMERCIALFLEET_MODULE_SCREEN_NAME, $request, $commercialfleet));

        return $response
            ->setPreviousUrl(route('commercialfleet.index'))
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
            $commercialfleet = $this->commercialfleetRepository->findOrFail($id);

            $this->commercialfleetRepository->delete($commercialfleet);

            event(new DeletedContentEvent(COMMERCIALFLEET_MODULE_SCREEN_NAME, $request, $commercialfleet));

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
            $commercialfleet = $this->commercialfleetRepository->findOrFail($id);
            $this->commercialfleetRepository->delete($commercialfleet);
            event(new DeletedContentEvent(COMMERCIALFLEET_MODULE_SCREEN_NAME, $request, $commercialfleet));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
