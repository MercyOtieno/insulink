<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\CommercialRequest;
use Botble\Quotation\Repositories\Interfaces\CommercialInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\CommercialTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\CommercialForm;
use Botble\Base\Forms\FormBuilder;

class CommercialController extends BaseController
{
    /**
     * @var CommercialInterface
     */
    protected $commercialRepository;

    /**
     * @param CommercialInterface $commercialRepository
     */
    public function __construct(CommercialInterface $commercialRepository)
    {
        $this->commercialRepository = $commercialRepository;
    }

    /**
     * @param CommercialTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CommercialTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::commercial.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::commercial.create'));

        return $formBuilder->create(CommercialForm::class)->renderForm();
    }

    /**
     * @param CommercialRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CommercialRequest $request, BaseHttpResponse $response)
    {
        $commercial = $this->commercialRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(COMMERCIAL_MODULE_SCREEN_NAME, $request, $commercial));

        return $response
            ->setPreviousUrl(route('commercial.index'))
            ->setNextUrl(route('commercial.edit', $commercial->id))
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
        $commercial = $this->commercialRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $commercial));

        page_title()->setTitle(trans('plugins/quotation::commercial.edit') . ' "' . $commercial->name . '"');

        return $formBuilder->create(CommercialForm::class, ['model' => $commercial])->renderForm();
    }

    /**
     * @param $id
     * @param CommercialRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CommercialRequest $request, BaseHttpResponse $response)
    {
        $commercial = $this->commercialRepository->findOrFail($id);

        $commercial->fill($request->input());

        $this->commercialRepository->createOrUpdate($commercial);

        event(new UpdatedContentEvent(COMMERCIAL_MODULE_SCREEN_NAME, $request, $commercial));

        return $response
            ->setPreviousUrl(route('commercial.index'))
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
            $commercial = $this->commercialRepository->findOrFail($id);

            $this->commercialRepository->delete($commercial);

            event(new DeletedContentEvent(COMMERCIAL_MODULE_SCREEN_NAME, $request, $commercial));

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
            $commercial = $this->commercialRepository->findOrFail($id);
            $this->commercialRepository->delete($commercial);
            event(new DeletedContentEvent(COMMERCIAL_MODULE_SCREEN_NAME, $request, $commercial));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
