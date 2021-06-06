<?php

namespace Botble\Quotation\Models;

use Botble\ACL\Models\User;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Theme\Insulink\Http\Models\VehicleBook;
use Theme\Insulink\Http\Models\HealthDependant;
use Theme\Insulink\Http\Models\CustomerDocument;

class Customer extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function users() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'customer_id');
    }

    public function vehicles()
    {
        return $this->hasMany(VehicleBook::class);
    }
    public function customerdocs()
    {
        return $this->hasMany(CustomerDocument::class);
    }
    public function dependants()
    {
        return $this->hasMany(HealthDependant::class, 'customer_id');
    }
}
