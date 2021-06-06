<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\ACL\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Botble\Member\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use EnumCastable;
     use Notifiable;
    use HasApiTokens;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';
    protected $dates = ['principal_dob'];
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'cellphone',
        'document_number',
        'kra_number',
        'email',
        'status'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
/**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'customer_id');
    }

    public function dependants()
    {
        return $this->hasMany(HealthDependant::class, 'dependant_id');
    }
}
