<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LMProfileMaster;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\LM\Transformers\LessonTransformer;

class ProfileController extends ApiController
{
    protected $lessonTransformer;
    
    function __construct(LessonTransformer $lessonTransformer){
        $this->lessonTransformer = $lessonTransformer;
        //$this->middleware('auth');
    }
    
    public function index()
        {
        	$profiles = LMProfileMaster::all();
        	return $this->respond([
        			'data' => $this->lessonTransformer->transformCollection($profiles->all())
        		]);
        }

    public function show($LM_PM_PROFILE_ID)
        {
        	//$profile = LMProfileMaster::find($id);
        	$profile = LMProfileMaster::where('LM_PM_PROFILE_ID', $LM_PM_PROFILE_ID)->first();
        	if(! $profile){
                return $this->respondNotFound('Profile does not exist.');
                // return $this->respondWithError(404, 'Profile does not exist.');
        		// return Response::json([
        		// 		'error' => [
        		// 			'message' => 'Profile does not exist.'
        		// 		]
        		// 	], 404);
        	}
        	return $this->respond([
        			'data' => $this->lessonTransformer->transform($profile)
        		]);
        }

    public function store()
        {
            if( ! Input::get('LM_PM_EMAIL') or ! Input::get('LM_PM_MOBILE')){
                return $this->setStatusCode(422)->respondWithError('Parameters failed validation for a profile.');
            }
            LMProfileMaster::create(Input::all());
            return $this->respondCreated('Profile successfully created.');
        }
}
