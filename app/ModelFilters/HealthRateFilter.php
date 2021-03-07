<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class HealthRateFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function product($cover_type){
        if ($cover_type) {
           return $this->where('cover_type', $cover_type);
        }
    }

    public function ageLimit($age){
        return $this->where('age_limits', 'LIKE', "$age%");
    }

    public function inPatient($ip){
        return $this->where('ip', 'LIKE', "$ip%");
    }
}
