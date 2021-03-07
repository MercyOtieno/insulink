<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Domesticrates extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'domesticrates';

    /**
     * @var array
     */
    protected $fillable = [
        'building_rate',
        'rent_recievable',
        'machinery_breakdown_risk',
        'wiba_servants_indoor',
        'wiba_servants_outdoor',
        'employers_liability',
        'occupiers_liability',
        'owners_liability',
        'personal_accident',
        'home_office',
        'terrorism_political',
        'items_rate',
        'allrisk_rate_a',
        'allrisk_rate_b',
        'product_id',
        'status',
        'added_by',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    const LANDLORD = 'isLandlord';
    const HOMEOWNER = 'isHomeowner';
    const TENANT = 'isTenant';
}
