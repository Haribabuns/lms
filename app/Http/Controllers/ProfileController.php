<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LMProfileMaster;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\LM\Transformers\LessonTransformer;
use Illuminate\Support\Facades\Input;

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

    public function create()
        {
            // load the create form
            return View::make('profilemaster.create');
        }

    // public function store()
    //     {
    //         if( ! Input::get('LM_PM_EMAIL') or ! Input::get('LM_PM_MOBILE')){
    //             return $this->setStatusCode(422)->respondWithError('Parameters failed validation for a profile.');
    //         }
    //         LMProfileMaster::create(Input::all());
    //         return $this->respondCreated('Profile successfully created.');
    //     }

    public function store(Request $request)
        {
            $this->validate($request, [
            'LM_PM_PROFILE_ID' => 'bail|required',
            'LM_PM_FIRST_NAME' => 'required',
            'LM_PM_EMAIL'      => 'required',
            'LM_PM_MOBILE'     => 'required',
            'LM_PM_DOB'        => 'required',
            'LM_PM_GENDER'     => 'required',
            'LM_PM_CITY'       => 'required',
            'LM_PM_STATE'      => 'required',
            'LM_PM_COUNTRY'    => 'required',
            'LM_PM_CITYCODE'   => 'required',
            ]);
            
            $profile = new App\LMProfileMaster;
            $profile->LM_PM_PROFILE_ID     = Input::get('LM_PM_PROFILE_ID');
            $profile->LM_PM_FIRST_NAME     = Input::get('LM_PM_FIRST_NAME');
            $profile->LM_PM_LAST_NAME      = Input::get('LM_PM_LAST_NAME');
            $profile->LM_PM_EMAIL          = Input::get('LM_PM_EMAIL');
            $profile->LM_PM_MOBILE         = Input::get('LM_PM_MOBILE');
            $profile->LM_PM_DOB            = Input::get('LM_PM_DOB');
            $profile->LM_PM_GENDER         = Input::get('LM_PM_GENDER');
            $profile->LM_PM_CITY           = Input::get('LM_PM_CITY');
            $profile->LM_PM_STATE          = Input::get('LM_PM_STATE');
            $profile->LM_PM_COUNTRY        = Input::get('LM_PM_COUNTRY');
            $profile->LM_PM_CITYCODE       = Input::get('LM_PM_CITYCODE');
            $profile->save();
            return $this->respondCreated('Profile successfully created.');
        }
    
    public function update($LM_PM_PROFILE_ID)
        {
            $profile = LMProfileMaster::where('LM_PM_PROFILE_ID', $LM_PM_PROFILE_ID)->first();
            if(! $profile){
                return $this->respondNotFound('Profile does not exist.');
                }            
            $profile->LM_PM_PROFILE_ID     = Input::get('LM_PM_PROFILE_ID');
            $profile->LM_PM_FIRST_NAME     = Input::get('LM_PM_FIRST_NAME');
            $profile->LM_PM_LAST_NAME      = Input::get('LM_PM_LAST_NAME');
            $profile->LM_PM_EMAIL          = Input::get('LM_PM_EMAIL');
            $profile->LM_PM_MOBILE         = Input::get('LM_PM_MOBILE');
            $profile->LM_PM_DOB            = Input::get('LM_PM_DOB');
            $profile->LM_PM_GENDER         = Input::get('LM_PM_GENDER');
            $profile->LM_PM_CITY           = Input::get('LM_PM_CITY');
            $profile->LM_PM_STATE          = Input::get('LM_PM_STATE');
            $profile->LM_PM_COUNTRY        = Input::get('LM_PM_COUNTRY');
            $profile->LM_PM_CITYCODE       = Input::get('LM_PM_CITYCODE');
            $profile->save();
            return $this->respondCreated('Profile successfully created.');
        }

    public function destroy($LM_PM_PROFILE_ID)
        {
            //$profile = LMProfileMaster::find($LM_PM_PROFILE_ID);
            $profile = LMProfileMaster::where('LM_PM_PROFILE_ID', $LM_PM_PROFILE_ID)->first();
            if(! $profile){
                return $this->respondNotFound('Profile does not exist.');
                }
            $profile->delete();
            Session::flash('message', 'Successfully deleted the profile!');
            return Redirect::to('profile');
        }
}