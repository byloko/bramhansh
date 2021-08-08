<?php

namespace App\Http\Controllers\Backend;
// use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FeedBackModel;


class FeedBackController extends Controller
{
	public function feed_back_index(Request $request)
	{
		$getrecord = FeedBackModel::orderBy('id', 'desc')->select('feed_back.*');

        $getrecord = $getrecord->join('users', 'feed_back.user_id', '=', 'users.id');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('feed_back.id', '=', $request->idsss);
        }
        if ($request->user_id) {
            $getrecord = $getrecord->where('users.firstname', 'like', '%' . $request->user_id . '%');
        }
         if ($request->feedback_rate) {
            $getrecord = $getrecord->where('feed_back.feedback_rate', 'like', '%' . $request->feedback_rate . '%');
        }
         if ($request->feedback_message) {
            $getrecord = $getrecord->where('feed_back.feedback_message', 'like', '%' . $request->feedback_message . '%');
        }

        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;

		$data['meta_title'] = 'Feed Back List';
		return view('backend.feed_back.list', $data);
	}


	public function feed_back_destroy($id)
	{
		 $user_update = FeedBackModel::get_single($id);
         $user_update->delete();
         return redirect()->back()->with('error', 'Record successfully deleted!');
	}




}