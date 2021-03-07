<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class VehicleBook extends BaseModel
{

    protected $fillable = [
        'customer_id',
        'registration',
        'engine_no',
        'chasis_no',
        'seating_capacity',
        'cc',
        'year_manufacture',
        'value_of_vehicle',
        'make_model'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
