<?php

namespace Theme\Insulink\Http\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Product extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * underwriters
     *
     * @return void
     */
    public function underwriters()
    {
        return $this->belongsTo(Underwriter::class, 'underwriter_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class , 'added_by');
    }
    
    /**
     * rates
     *
     * @return void
     */
    public function motorprivaterates()
    {
        return $this->hasOne(Privaterates::class, 'product_id');
    }
    
    /**
     * healthrates
     *
     * @return void
     */
    public function healthrates()
    {
        return $this->hasOne(HealthRate::class, 'product_id');
    }
    
    /**
     * thirdparty
     *
     * @return void
     */
    public function thirdparty()
    {
        return $this->hasOne(Thirdpartyrates::class, 'product_id');
    }
    
    /**
     * commercialonline
     *
     * @return void
     */
    public function commercialonline()
    {
        return $this->hasOne(Commercial::class, 'product_id');
    }
     
     /**
      * domestic rates
      *
      * @return void
      */
     public function domestic(){
        return $this->hasOne(Domesticrates::class, 'product_id');
    }
        
    /**
     * generalcartages
     *
     * @return void
     */
    public function generalcartages()
    {
        return $this->hasOne(CommercialGeneralcartage::class, 'product_id');
    }
        
    /**
     * commercialowngoods
     *
     * @return void
     */
    public function commercialowngoods()
    {
        return $this->hasOne(Commercialowngoods::class, 'product_id');
    }

    CONST c1 = 'Comprehensive Commercial Motor Insurance - Own Goods';
    CONST c2 = 'Third Party Only Commercial Motor Insurance';
    CONST c3 = 'Comprehensive PSV SELF DRIVE Motor Insurance';
    CONST c4 = 'Third Party PSV SELF DRIVE Motor Insurance';
    CONST c5 = 'Comprehensive PSV CHAUFFEUR DRIVEN';
    CONST c6 = 'Comprehensive Private Motor Insurance';
    CONST c7 = 'Third Party Private Motor Insurance';
}
