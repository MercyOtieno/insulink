<?php

namespace Botble\Quotation\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Quotation\Repositories\Interfaces\CommercialgeneralcartageInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Quotation\Models\Commercialgeneralcartage;
use Html;

class CommercialgeneralcartageTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * CommercialgeneralcartageTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param CommercialgeneralcartageInterface $commercialgeneralcartageRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, CommercialgeneralcartageInterface $commercialgeneralcartageRepository)
    {
        $this->repository = $commercialgeneralcartageRepository;
        $this->setOption('id', 'plugins-commercialgeneralcartage-table');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['commercialgeneralcartage.edit', 'commercialgeneralcartage.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('commercialgeneralcartage.edit')) {
                    return $item->name;
                }
                return Html::link(route('commercialgeneralcartage.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('commercialgeneralcartage.edit', 'commercialgeneralcartage.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $select = [
            'commercialgeneralcartages.id',
            'commercialgeneralcartages.name',
            'commercialgeneralcartages.created_at',
            'commercialgeneralcartages.status',
        ];

        $query = $model->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'commercialgeneralcartages.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'commercialgeneralcartages.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'commercialgeneralcartages.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'commercialgeneralcartages.status',
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('commercialgeneralcartage.create'), 'commercialgeneralcartage.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Commercialgeneralcartage::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('commercialgeneralcartage.deletes'), 'commercialgeneralcartage.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'commercialgeneralcartages.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'commercialgeneralcartages.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'commercialgeneralcartages.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }
}
