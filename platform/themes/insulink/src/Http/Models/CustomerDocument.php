<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class CustomerDocument extends BaseModel
{
    protected $fillable = [
        'customer_id',
        'vehicle_book_id',
        'copy_kra_certificate',
        'copy_id',
        'logbook',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
