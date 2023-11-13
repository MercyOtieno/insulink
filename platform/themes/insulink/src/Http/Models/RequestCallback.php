<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class RequestCallback extends BaseModel
{
    protected $table = 'request_callbacks';

    protected $fillable = ['subject', 'name', 'email', 'phone', 'contact_preference', 'contact_date', 'status'];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'name' => SafeContent::class,
    ];
}
