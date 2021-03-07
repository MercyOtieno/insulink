<?php


namespace Theme\Insulink\Dsc\Calculators;

use Theme\Insulink\Dsc\Helpers\MotorHelper;

class DomesticCalculator
{
    private $stamp_duty;
    private $loss_use;
    private $levies;
    public function __construct() {
        $this->stamp_duty = 40;
        $this->loss_use = 0;
        $this->levies= self::levies();
    }

     //Calculator for Motor Private Third Party
    public function calculateTenant($rate, $value_content, $portables, $productID) {
        $totalPremium = 0;
        switch ($productID) {
            case 39:
                $premium = ($rate * $value_content/100);
                
                $finalportables = (3.75 * $portables/100);
                
                $totalPremium = $premium + $finalportables;
                $addLevies = $totalPremium * $this->levies;
                break;
            
            default:
                $premium = ($rate * $value_content/100);
                $finalportables = (1* $portables/100);
                $totalPremium = $premium + $finalportables;
                $addLevies = $totalPremium * $this->levies;
                break;
        }
        //Calculate the premium from available underwriters
        return [
            'premium' => $totalPremium + $this->stamp_duty + $addLevies,
            'stamp_duty' => $this->stamp_duty,
            'levies' => $addLevies
        ];
    }

    public function calculateLandlord($rateused, $building_value, $personal_accident ,$owners_liabity) {
        switch ($rateused->product_id) {
            case 38:
                $premium = ($rateused->building_rate * $building_value/100);
                if($personal_accident) {
                    $personal_accidentt = 2000;
                }
                if($owners_liabity) {
                    $owners_liabityy = (0.1 * $owners_liabity/100);
                }
                $totalPremium = $premium + $owners_liabityy + $personal_accidentt;
                $addLevies = $totalPremium * $this->levies;
                break;
            
            default:
               $premium = ($rateused->building_rate * $building_value/100);
                if($personal_accident) {
                    $personal_accidentt = 0;
                }
                if($owners_liabity) {
                    $owners_liabityy = 0;
                }
                $totalPremium = $premium + $owners_liabityy + $personal_accidentt;
                $addLevies = $totalPremium * $this->levies;
                break;
        }
        //Calculate the premium from available underwriters
        return [
            'premium' => $premium + $this->stamp_duty + $addLevies,
            'stamp_duty' => $this->stamp_duty,
            'levies' => $addLevies
        ];
    }

    public function calculateHomeowner($rateused, $value_content, $building_value, $portables, $what_to_insure,$wiba_servants_indoor,$wiba_servants_outdoor, $personal_accident ,$owners_liabity) {
        switch ($rateused->product_id) {
            case 38:
                /**
                 * Calculate building
                 */
                $building =  ($rateused->building_rate * $building_value/100);
                /**WIBA
                 * 
                 */
                if ( $wiba_servants_outdoor || $wiba_servants_indoor) {
                   $outdoor = $wiba_servants_outdoor * 1000;
                   $indoor = $wiba_servants_indoor * 500;
                }
                if($personal_accident) {
                    $personal_accidentt = 2000;
                }
                if($owners_liabity) {
                    $owners_liabityy = (0.1 * $owners_liabity/100);
                }
                $premium = ($rateused->items_rate * $value_content/100);
                $finalportables = (1 * $portables/100);
                $totalPremium = $premium + $finalportables + $building + $owners_liabityy + $personal_accidentt;
                $addLevies = $totalPremium * $this->levies;
                break;
            
            default:
                /**
                 * Calculate building
                 */
                $building =  (0.1250 * $building_value/100);
                $prem = $portables + $value_content;
                $premium = ($rateused->items_rate * $prem/100);
                $finalportables = (3.75 * $portables/100);
                $totalPremium = $premium + $finalportables + $building;
                $addLevies = $totalPremium * $this->levies;
                break;
        }

        //Calculate the premium from available underwriters
        return [
            'premium' => $premium + $this->stamp_duty + $addLevies,
            'stamp_duty' => $this->stamp_duty,
            'building' =>$building,
            'phone_jewella' => $finalportables,
            'valuables' => $premium,
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