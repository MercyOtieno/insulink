<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class PaymentMethod extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paymentmethods';

    /**
     * @var array
     */
    protected $fillable = [
        'paybill',
        'account_number',
        'account_name',
        'branch_code',
        'paypalemail',
        'underwriter_id',
        'method',
        'added_by',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
