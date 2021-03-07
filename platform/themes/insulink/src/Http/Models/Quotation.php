<?php

namespace Theme\Insulink\Http\Models;

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
        'maternity',
        'dental',
        'optical',
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
        'levies',
        'premium',
        'stamp_duty',
        'personal_accident',
        'occupier_liability',
        'owners_liability',
        'content_value',
        'building_value',
        'domestic_type',
        'location',
        'pre_existing_details',
        'status',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
