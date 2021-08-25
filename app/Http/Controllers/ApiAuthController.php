<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * User Authentication script.
 *
 * This script is meant to be called from an api requests
 * It will generate token every successful requests
 *
 * @copyright  2021 Alan Padiernos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class ApiAuthController extends Controller
{
   
	
	/**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string 
     */
    public function register(Request $request)
    {
        // Validation
        $validatorResponse = Validator::make($request->all(),[
            'name' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Send failed response if validation fails
		if ($validatorResponse->fails()) {
            return $this->sendInvalidFieldResponse($validatorResponse->errors());
        }
		
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
       

        $token = $user->createToken('LaravelAuthApp')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 

    /**
     * login and authenticate user .
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string 
     */
    public function login(Request $request)
    {

        // Validation
        $validatorResponse = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Send failed response if validation fails
        if ($validatorResponse->fails()) {
            return $this->sendInvalidFieldResponse($validatorResponse->errors());
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    } 


}