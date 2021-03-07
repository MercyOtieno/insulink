<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Privaterates extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privaterates';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'rate_value_below',
        'rate_value_above',
        'medical_expense',
        'windscreen',
        'towing_recovery',
        'stamp_duty',
        'training_levy',
        'entertainment',
        'authorised_repair',
        'per_event',
        'per_person',
        'tppd',
        'excess_protector',
        'political_terrorism',
        'loss_use',
        'road_rescue',
        'riot',
        'status',
        'age_limit'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Age Limit
     */
    CONST ABOVE15 = 'above 15';
    CONST BELOW15 = 'below 15';
    CONST ABOVEONEMILLION = 'above 1 million';
    CONST BELOWONEMILLION = 'below 1 million';
    CONST ISINCLUSIVE = 'Included in the Premium';
}
