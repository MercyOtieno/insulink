<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Commercialowngoods extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commercialowngoods';

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
    
    /**
     * products
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
