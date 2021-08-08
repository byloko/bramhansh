<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProgramModel;
use App\Models\PlaylistModel;
use App\Models\VideoModel;
use App\Models\BuyNowModel;
use App\Models\TotalTimeModel;
use App\Models\FeedBackModel;
use App\Mail\ForgotPasswordMail;
use Hash;
use Mail;


class APIController extends Controller {
	
	public function app_register(Request $request)
	{
		if(!empty($request->firstname && !empty($request->lastname) && !empty($request->password) && !empty($request->age) && !empty($request->country) && !empty($request->email))){
			$check_email = User::where('firstname', '=', $request->firstname)->count();
// if(!empty($check_email)){
			if($check_email == '0'){
	    	//$uprecord = User::find($request->user_id);
 
		//	if(!empty($uprecord)){
 				   $uprecord = new User;
 				  
			       $uprecord->firstname      = trim($request->firstname);
			       $uprecord->lastname  = trim($request->lastname);
				   $uprecord->email     = trim($request->email);
				   $uprecord->password  = Hash::make($request->password);
				   $uprecord->country   = trim($request->country);
				   $uprecord->age       = trim($request->age);
				   $uprecord->save();
				 
				$json['status'] = 1;
		  	 	$json['message'] = 'Account successfully created.';
		  	 	$json['result'] = $this->getProfileUser($uprecord->id);

		  	 

		  // 	 }else
		  //    {
			 //   	$json['status'] = 0;
				// $json['message'] = 'Invalid User.';
		  //   }
		    }else 
		   {

			$json['status'] = 0;
			$json['message'] = 'Your username already exist please login or try again.';
		   }

		   }else 
		   {

			$json['status'] = 0;
			$json['message'] = 'Parameter missing!';
		   }

		echo json_encode($json);
	}

	public function app_login(Request $request) {

		if (!empty($request->firstname) && !empty($request->password)) {

				$user = User::where('firstname', '=', $request->firstname)->first();
				 // if(!empty($user->is_email_verify == 1)){
				if (!empty($user)) {
					$check = Hash::check($request->password, $user->password);
					if (!empty($check)) {

						// if(!empty($request->device_token))
						// {
							$datauser = User::find($user->id);	
							//$datauser->token             = !empty($request->token)?$request->token:null;
							//$datauser->remember_token    = !empty($request->token)?$request->token:null;
						//	$datauser->device_token = $request->device_token;
						//	$datauser->save();
						// }

						//   $this->updateToken($datauser->id);

						$json['status'] = 1;
						$json['message'] = 'Record found.';
						$json['result'] = $this->getProfileUser($user->id);
					} else {
						$json['status'] = 0;
						$json['message'] = 'Your email or password is incorrect please try again.';
					}
				} else {
					$json['status'] = 0;
					$json['message'] = 'Your username or password is incorrect please try again.';
				}
				// }else
				// {
				// 	$json['status'] = 0;
				// 	$json['message'] = 'Email not verified please try again.';
				// }
		} else {

			$json['status'] = 0;
			$json['message'] = 'Due to some error please try again.';
		}

		echo json_encode($json);
	}


	public function getProfileUser($id)
	{
		$user 				    = User::find($id);
		$json['user_id']		= $user->id;
		$json['firstname'] 		= !empty($user->firstname) ? $user->firstname : '';
		$json['lastname'] 		= !empty($user->lastname) ? $user->lastname : '';
		$json['email'] 		    = !empty($user->email) ? $user->email : '';
		$json['country'] 	    = !empty($user->country) ? $user->country : '';
		$json['age'] 	        = !empty($user->age) ? $user->age : '';
		return $json;
	}

	public function app_forgot_email(Request $request){

 		if(!empty($request->firstname)) {
 			$rendome_password           = rand(111111,999999);
			$user =  User::where('firstname','=',$request->firstname)->first();	

			if(!empty($user))
			{
				// $user->remember_token = str_random(50);
			    // $user->save();
			    $user->password = Hash::make($rendome_password);
			   
			    $user->save();
			    $user->password_rendome   = $rendome_password;
			    Mail::to($user->email)->send(new ForgotPasswordMail($user));

			    $json['status'] = 1;
				$json['message'] = 'Password has been reset and sent to you mailbox';
			}
			else
			{
				$json['status'] = 0;
				$json['message'] = 'Username not found in the system.';	
			}
		}
		else {
			$json['status'] = 0;
			$json['message'] = 'Due to some error please try again.';
		}
		echo json_encode($json);

	}

	public function app_program_list(Request $request){
		$result = array();
	   
		$getresult = ProgramModel::get();

		foreach ($getresult as $value) {
			$data['id'] 	       = $value->id;
			$data['program_name']    = !empty($value->program_name) ? $value->program_name : '';
			$result[] = $data;
		}
		$json['status'] = 1;
		$json['message'] = 'All program loaded successfully.';
		$json['result'] = $result;
	   
	   echo json_encode($json);
	}

	public function app_playlist_list(Request $request){
		$result = array();
		
		if(!empty($request->program_id))
		{
	    // $getresult = PlaylistModel::get();
	    $getresult = PlaylistModel::where('program_id', '=', $request->program_id)->get();

		foreach ($getresult as $value) {
			$data['id']				       = $value->id;
			$data['program_id']		       = !empty($value->program_id) ? $value->program_id : '';
			$data['playlist_name']  = !empty($value->playlist_name) ? $value->playlist_name : '';
			
			$result[] = $data;
		}
			$json['status'] = 1;
			$json['message'] = 'All play list loaded successfully.';
			$json['result'] = $result;
		}
		else
		{	
			$json['status'] = 0;
			$json['message'] = 'Record not found.';
		}

		echo json_encode($json);
	}

	public function app_video_list(Request $request){
		$result = array();
		//$getresult = VideoModel::get();
		if(!empty($request->program_id) && !empty($request->playlist_id))
		{
		$getresult = VideoModel::where('program_id', '=', $request->program_id)->where('playlist_id', '=', $request->playlist_id)->get();
		foreach ($getresult as $value) {
			$data['id']                    = $value->id;
			$data['program_id']		       = !empty($value->program_id) ? $value->program_id : '';
			$data['playlist_id']		   = !empty($value->playlist_id) ? $value->playlist_id : '';
			$data['video_title']	       = !empty($value->video_title) ? $value->video_title : '';
			$data['video_url']			   = !empty($value->video_url) ? $value->video_url : '';
			$result[] = $data;
		}
		    $json['status'] = 1;
			$json['message'] = 'All video loaded successfully.';
			$json['result'] = $result;
		}else{
			$json['status'] = 0;
			$json['message'] = 'Record not found.';
		}
		echo json_encode($json);
	}

	public function app_buy_now_list_old(Request $request){
		$getUser = User::where('id', '=', $request->user_id)->count();
		if(!empty($getUser)){
			$getresult = BuyNowModel::where('user_id', '=', $request->user_id)->where('buy_state', '=', $request->buy_state)->first();
			if($getresult){
			if(!empty($getresult->buy_state)){
				$json['status'] = 1;
			    $json['message'] = 'Premium Customer.';
			}else{
				$json['status'] = 0;
			    $json['message'] = 'Processing.';
			}
			}
			else{
			$json['status'] = 0;
			$json['message'] = 'Record not found.';
			}
			}else{
				$json['status'] = 0;
				$json['message'] = 'User invalid.';
			}
		
		echo json_encode($json);
			
	}

	public function app_buy_now_list(Request $request){
		$getUser = User::where('id', '=', $request->user_id)->count();
		if(!empty($getUser)){
			$getresult = BuyNowModel::where('user_id', '=', $request->user_id)->first();
		
			if(empty($getresult)) {
				$getresult = new BuyNowModel;
			}
			$getresult->user_id       = trim($request->user_id);
			$getresult->save();

			$json['status'] = 1;
			$json['message'] = 'User buy now successfully created.';
			$json['result'] = $this->getBuyNow($getresult->id);
			}else{
				$json['status'] = 0;
				$json['message'] = 'User invalid.';
			}
		
		echo json_encode($json);
			
	}

	public function getBuyNow($id){
		$user 				        = BuyNowModel::get_single($id);
		$json['id']    		        = $user->id;
		$json['user_id']            = $user->user_id;
		$json['buy_state']    	    = $user->buy_state;

		return $json;	
	}

	public function app_total_time_add(Request $request){
		$getUser = User::where('id', '=', $request->user_id)->count();
		// dd($getOrder);

		$update_rec = PlaylistModel::where('id', '=', $request->playlist_id)->first();

		if(!empty($getUser)){
		
		$record_insert = new TotalTimeModel;
	
		if(!empty($record_insert) && !empty($update_rec)){

			$record_insert->user_id  		   = trim($request->user_id);
			$record_insert->playlist_id  	   = trim($request->playlist_id);
			$record_insert->total_time  	   = trim($request->total_time);
			$record_insert->save();

		    $json['status'] = 1;
			$json['message'] = 'Total Time successfully.';

			$json['result'] = $this->getTotalTimeList($record_insert->id);
			
			}else{
				$json['status'] = 0;
				$json['message'] = 'Invalid Playlist .';
			}
		} 
		else 
		{

			$json['status'] = 0;
			$json['message'] = 'Invalid User.';
		}

		echo json_encode($json);
	}

	public function getTotalTimeList($id)
	{
		$user 				        = TotalTimeModel::get_single($id);
		$json['id']    		        = $user->id;
		$json['user_id']            = $user->user_id;
		$json['playlist_id']    	    = $user->playlist_id;
	    $json['total_time'] 		    = !empty($user->total_time) ? $user->total_time : '';

		return $json;
	}

	public function app_feed_back_add(Request $request){

		$getUser = User::where('id', '=', $request->user_id)->count();
	
		if(!empty($getUser)){
		
		$record_insert = new FeedBackModel;
	
		if(!empty($record_insert)){

			$record_insert->user_id  		   = trim($request->user_id);
			$record_insert->feedback_rate  	   = trim($request->feedback_rate);
			$record_insert->feedback_message  	   = trim($request->feedback_message);
			$record_insert->save();

		    $json['status'] = 1;
			$json['message'] = 'Feedback successfully send.';

			$json['result'] = $this->getFeedBackList($record_insert->id);
			
			}else{
				$json['status'] = 0;
				$json['message'] = 'Invalid Playlist .';
			}
		} 
		else 
		{

			$json['status'] = 0;
			$json['message'] = 'Invalid User.';
		}

		echo json_encode($json);
	}

	public function getFeedBackList($id){
		$user 				        = FeedBackModel::get_single($id);
		$json['id']    		        = $user->id;
		$json['user_id']            = $user->user_id;
		$json['feedback_rate']    	= $user->feedback_rate;
	    $json['feedback_message'] 	= !empty($user->feedback_message) ? $user->feedback_message : '';

		return $json;
	}

	
}