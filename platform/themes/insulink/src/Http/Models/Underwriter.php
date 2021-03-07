<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Underwriter extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'underwriters';

    /**
     * @var array
     */
        protected $fillable = [
        'company',
        'api_key',
        'api_email',
        'api_password',
        'api_prod_url',
        'api_uat_url',
        'api_secret',
        'address',
        'phone',
        'logo',
        'status',
        'email'
    ];

    /**
     * Get Images
     */
    public function getLogoAttribute($value)
    {
        
        if (! $value) {
            return '/images/placeholder.jpg';
        } else {
            return '/images/underwriter/' . $value;
        }
    }

    /**
     * Constants
     */
    CONST ACTIVE = 'active';
    CONST INACTIVE = 'inactive';

    public function products()
    {
        return $this->hasOne(Product::class);
    }

    public function paymentmethod()
    {
        return $this->hasOne(Paymentmethod::class);
    }
}
