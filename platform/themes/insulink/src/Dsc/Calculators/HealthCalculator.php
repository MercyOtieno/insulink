<?php


namespace Theme\Insulink\Dsc\Calculators;

use Theme\Insulink\Dsc\Helpers\MotorHelper;
use Illuminate\Support\Collection;

class HealthCalculator
{
    private $stamp_duty;
    private $loss_use;
    private $levies;
    public function __construct() {
        $this->stamp_duty = 40;
        $this->loss_use = 0;
        $this->levies= self::levies();
    }
    public static function levies() {
        $rate = 0.45/100;
        return $rate;
    }

     
    //Calculator for Motor Private
    public function calculate($rateused, $ip ,$no_children ,$preexisting ,$dob, $age, $cover_type, $cover_details) {
        
        $premium = $rateused;
        $addLevies = round($premium) * $this->levies;

        //Calculate the premium from available underwriters
        return [
            'premium' => $premium + $this->stamp_duty + $addLevies,
            'stamp_duty' => $this->stamp_duty,
            'levies' => $addLevies,
        ];
        
    }

    private function checkifitsGA($products) {
        $products = new Collection(['42', '60', '61', '62', '63']);
        return $products->contains($products);
    }
}