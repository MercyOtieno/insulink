<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Payment extends BaseModel
{

    protected $fillable = [
        'quotation_id',
        'transaction_code',
        'policy_start_date',
        'amount_paid',
        'date_paid',
        'phone_paid',
        'status',
        'termsnconditions'
    ];
}
