<?php

namespace Botble\Quotation\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\ACL\Models\User;

class CorporateHealth extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'corporatehealth';

    /**
     * @var array
     */
    protected $fillable = [
        'company',
        'contact_person',
        'telephone',
        'no_employees',
        'ip',
        'op',
        'underwriter_id',
        'email',
        'status',
    ];
    CONST REQUESTED = 'request sent';

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'customer_id');
    }
}
