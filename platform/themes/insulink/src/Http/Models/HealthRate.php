<?php

namespace Theme\Insulink\Http\Models;

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

    protected $filters = [];
    /**
     * @var array
     */
    protected $fillable = [
        
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function scopeFilterAge($query, $age){
        return $query->where('age_limits', 'LIKE', "$age%");
    }
    
}
