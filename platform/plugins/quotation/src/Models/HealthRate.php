<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class HealthRate extends BaseModel
{
    use EnumCastable;

/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'healthrates';
    /**
     * @var array
     */
    protected $fillable = [
        'age_limits_min',
        'age_limits_max',
        'm',
        'm1',
        'm2',
        'm3',
        'm4',
        'spouse',
        'child',
        'm5',
        'extra_dependant',
        'ip',
        'op',
        'maternity',
        'ip_accident',
        'ip_illness',
        'ip_marternity_complications',
        'chronic_pre_existing',
        'newlydiagnosedcondition',
        'bed_limit',
        'congenital_cond',
        'psychiatric',
        'funeral',
        'personal_accident',
        'dental',
        'optical',
        'annual_checkup',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
