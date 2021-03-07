<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\CommercialgeneralcartageRequest;
use Botble\Quotation\Repositories\Interfaces\CommercialgeneralcartageInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\CommercialgeneralcartageTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\CommercialgeneralcartageForm;
use Botble\Base\Forms\FormBuilder;

class CommercialgeneralcartageController extends BaseController
{
    /**
     * @var CommercialgeneralcartageInterface
     */
    protected $commercialgeneralcartageRepository;

    /**
     * @param CommercialgeneralcartageInterface $commercialgeneralcartageRepository
     */
    public function __construct(CommercialgeneralcartageInterface $commercialgeneralcartageRepository)
    {
        $this->commercialgeneralcartageRepository = $commercialgeneralcartageRepository;
    }

    /**
     * @param CommercialgeneralcartageTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CommercialgeneralcartageTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::commercialgeneralcartage.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::commercialgeneralcartage.create'));

        return $formBuilder->create(CommercialgeneralcartageForm::class)->renderForm();
    }

    /**
     * @param CommercialgeneralcartageRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CommercialgeneralcartageRequest $request, BaseHttpResponse $response)
    {
        $commercialgeneralcartage = $this->commercialgeneralcartageRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(COMMERCIALGENERALCARTAGE_MODULE_SCREEN_NAME, $request, $commercialgeneralcartage));

        return $response
            ->setPreviousUrl(route('commercialgeneralcartage.index'))
            ->setNextUrl(route('commercialgeneralcartage.edit', $commercialgeneralcartage->id))
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
        $commercialgeneralcartage = $this->commercialgeneralcartageRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $commercialgeneralcartage));

        page_title()->setTitle(trans('plugins/quotation::commercialgeneralcartage.edit') . ' "' . $commercialgeneralcartage->name . '"');

        return $formBuilder->create(CommercialgeneralcartageForm::class, ['model' => $commercialgeneralcartage])->renderForm();
    }

    /**
     * @param $id
     * @param CommercialgeneralcartageRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CommercialgeneralcartageRequest $request, BaseHttpResponse $response)
    {
        $commercialgeneralcartage = $this->commercialgeneralcartageRepository->findOrFail($id);

        $commercialgeneralcartage->fill($request->input());

        $this->commercialgeneralcartageRepository->createOrUpdate($commercialgeneralcartage);

        event(new UpdatedContentEvent(COMMERCIALGENERALCARTAGE_MODULE_SCREEN_NAME, $request, $commercialgeneralcartage));

        return $response
            ->setPreviousUrl(route('commercialgeneralcartage.index'))
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
            $commercialgeneralcartage = $this->commercialgeneralcartageRepository->findOrFail($id);

            $this->commercialgeneralcartageRepository->delete($commercialgeneralcartage);

            event(new DeletedContentEvent(COMMERCIALGENERALCARTAGE_MODULE_SCREEN_NAME, $request, $commercialgeneralcartage));

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
            $commercialgeneralcartage = $this->commercialgeneralcartageRepository->findOrFail($id);
            $this->commercialgeneralcartageRepository->delete($commercialgeneralcartage);
            event(new DeletedContentEvent(COMMERCIALGENERALCARTAGE_MODULE_SCREEN_NAME, $request, $commercialgeneralcartage));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
