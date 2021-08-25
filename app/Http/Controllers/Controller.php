<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiRequests;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\Helpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait, ApiRequests, Helpers;

 	protected $base_url;

    /**
     * Seting up the url of github.
     * @return void
     */
   	public function __construct()
    {
        $this->base_url = 'https://api.github.com';
       
    } 	 

     /**
     * use to solve the humming distance of 2 integers.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string 
     */
   	public function solve_humming_distance(Request $request)
    {
        // Validation
        $validatorResponse = Validator::make($request->all(),[
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ]);

        // Send failed response if validation fails
		if ($validatorResponse->fails()) {
            return $this->sendInvalidFieldResponse($validatorResponse->errors());
        }
        $dh = $this->humming_distance($request->x,$request->y);	
	    
	    return response()->json(['hummingdistance' => $dh], 200);
    } 	    
      
}
