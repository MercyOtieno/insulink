<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Commercialgeneralcartage extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commercialgeneralcartages';

    /**
     * @var array
     */
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

    
}
