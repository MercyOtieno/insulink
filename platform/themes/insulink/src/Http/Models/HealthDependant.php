<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class HealthDependant extends BaseModel
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'healthdependants';
    protected $fillable = [
        'customer_id',
        'dependant_name',
        'dependant_dob',
        'relationship',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
