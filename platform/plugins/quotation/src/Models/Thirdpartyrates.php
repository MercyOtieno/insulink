<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Thirdpartyrates extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thirdpartyrates';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];

    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
