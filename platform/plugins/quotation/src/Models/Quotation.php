<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Quotation extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quotations';

    protected $fillable = [
        'quotation_number',
        'product_id',
        'inpatient',
        'outpatient',
        'quotation_type',
        'customer_id',
        'total_price',
        'road_rescue',
        'excess_protector',
        'pvt',
        'loss_use',
        'cover_type',
        'value_of_vehicle',
        'status',
    ];

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
    'created_at' => 'datetime:d-m-Y',
    'updated_at' => 'datetime:Y-m-d',
    'deleted_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
