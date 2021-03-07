<?php

namespace Theme\Insulink\Http\Controllers;


use App\Models\Travel;
use Illuminate\Http\Request;
use App\Notifications\TravelQuote;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Theme\Insulink\Http\Models\Product;
use Theme\Insulink\Dsc\Helpers\MotorHelper;
use Theme\Insulink\Http\Models\Vehiclemake;
use Illuminate\Support\Facades\Notification;
use Theme\Insulink\Http\Models\Vehiclemodel;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Theme\Http\Controllers\PublicController;
use Validator;

class InsulinkController extends PublicController
{
    
    /**
     * {@inheritDoc}
     */
    public function getIndex(BaseHttpResponse $response)
    {
        return parent::getIndex($response);
    }

    /**
     * {@inheritDoc}
     */
    public function getView(BaseHttpResponse $response, $key = null)
    {
        return parent::getView($response, $key);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }

    public function getYears() {
        $miaka = [];
        for ($year=date("Y")-15; $year <= date("Y")-1; $year++) $miaka[$year] = $year;
        return response()->json([
            'years' =>  $miaka
        ]);
    }

    public function getVehicleMakes() {
        return response()->json([
            'vehiclemakes' => Vehiclemake::all()
        ]);
    }

    /**
     * Get Vehicle Model
     */
    public function getVehicleModels($make) {
        $model = Vehiclemodel::where('make_id', $make)->get();
        return $model;
    }

    public function getUnderwriters() {
        $underwriters = DB::table('products')
                        ->join('underwriters', 'underwriters.id', '=', 'products.underwriter_id')
                        ->select('underwriters.id', 'underwriters.company', 'underwriters.status')
                        ->where('products.category', 'health')
                        ->where('underwriters.status','active')
                        ->groupBy('underwriters.id')
                        ->get();
        return $underwriters;
    }
    
    

}
