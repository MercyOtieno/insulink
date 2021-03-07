<?php


namespace Theme\Insulink\Dsc\Calculators;

use Theme\Insulink\Dsc\Helpers\MotorHelper;

class MotorCalculator
{
    private $stamp_duty;
    private $loss_use;
    private $levies;
    public function __construct() {
        $this->stamp_duty = 40;
        $this->loss_use = 0;
        $this->levies= self::levies();
    }

    public function setLossUse($rate) {
        $this->loss_use = $rate;
    }

    //Calculator for Motor Private
    public function calculate($rate, $v_value) {
        $premium = ($rate * $v_value/100);
        $addLevies = $premium * $this->levies;

        //Calculate the premium from available underwriters
        return [
            'premium' => $premium + $this->stamp_duty + $addLevies,
            'stamp_duty' => $this->stamp_duty,
            'levies' => $addLevies
        ];
    }

    //Calculator for Motor Private Third Party
    public function calculateThirdParty($rate, $v_value) {
        $premium = $rate;
        $addLevies = $premium * $this->levies;

        //Calculate the premium from available underwriters
        return [
            'premium' => $premium + $this->stamp_duty + $addLevies,
            'stamp_duty' => $this->stamp_duty,
            'levies' => $addLevies
        ];
    }

    /**
     * Jubilee General
     */
    public static function levies() {
        $rate = 0.45/100;
        return $rate;

    }

}
