<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class CommercialGeneralcartage extends BaseModel
{
    protected $table = 'commercialgeneralcartages';

    protected $fillable = [
        'product_id',
        'amount_10years',
        'amount_above10years',
        'tppd',
        'passenger_legal_liability',
        'entertainment',
        'windscreen',
        'repairs',
        'towing',
        'medical',
        'third_party_body',
        'added_by',
        'status'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}