<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\CommercialowngoodsRequest;
use Botble\Quotation\Repositories\Interfaces\CommercialowngoodsInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\CommercialowngoodsTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\CommercialowngoodsForm;
use Botble\Base\Forms\FormBuilder;

class CommercialowngoodsController extends BaseController
{
    /**
     * @var CommercialowngoodsInterface
     */
    protected $commercialowngoodsRepository;

    /**
     * @param CommercialowngoodsInterface $commercialowngoodsRepository
     */
    public function __construct(CommercialowngoodsInterface $commercialowngoodsRepository)
    {
        $this->commercialowngoodsRepository = $commercialowngoodsRepository;
    }

    /**
     * @param CommercialowngoodsTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CommercialowngoodsTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::commercialowngoods.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::commercialowngoods.create'));

        return $formBuilder->create(CommercialowngoodsForm::class)->renderForm();
    }

    /**
     * @param CommercialowngoodsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CommercialowngoodsRequest $request, BaseHttpResponse $response)
    {
        $commercialowngoods = $this->commercialowngoodsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(COMMERCIALOWNGOODS_MODULE_SCREEN_NAME, $request, $commercialowngoods));

        return $response
            ->setPreviousUrl(route('commercialowngoods.index'))
            ->setNextUrl(route('commercialowngoods.edit', $commercialowngoods->id))
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
        $commercialowngoods = $this->commercialowngoodsRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $commercialowngoods));

        page_title()->setTitle(trans('plugins/quotation::commercialowngoods.edit') . ' "' . $commercialowngoods->name . '"');

        return $formBuilder->create(CommercialowngoodsForm::class, ['model' => $commercialowngoods])->renderForm();
    }

    /**
     * @param $id
     * @param CommercialowngoodsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CommercialowngoodsRequest $request, BaseHttpResponse $response)
    {
        $commercialowngoods = $this->commercialowngoodsRepository->findOrFail($id);

        $commercialowngoods->fill($request->input());

        $this->commercialowngoodsRepository->createOrUpdate($commercialowngoods);

        event(new UpdatedContentEvent(COMMERCIALOWNGOODS_MODULE_SCREEN_NAME, $request, $commercialowngoods));

        return $response
            ->setPreviousUrl(route('commercialowngoods.index'))
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
            $commercialowngoods = $this->commercialowngoodsRepository->findOrFail($id);

            $this->commercialowngoodsRepository->delete($commercialowngoods);

            event(new DeletedContentEvent(COMMERCIALOWNGOODS_MODULE_SCREEN_NAME, $request, $commercialowngoods));

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
            $commercialowngoods = $this->commercialowngoodsRepository->findOrFail($id);
            $this->commercialowngoodsRepository->delete($commercialowngoods);
            event(new DeletedContentEvent(COMMERCIALOWNGOODS_MODULE_SCREEN_NAME, $request, $commercialowngoods));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
