<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\ACL\Models\User;
class Models extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'models';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'make_id',
        'code',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function makes() {
        return $this->belongsTo(Makes::class, 'make_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class , 'added_by');
    }
}
