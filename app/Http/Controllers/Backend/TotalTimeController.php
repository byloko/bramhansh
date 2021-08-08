<?php

namespace App\Http\Controllers\Backend;
// use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TotalTimeModel;
use DB;
use Auth;

class TotalTimeController extends Controller
{
	public function total_time_index(Request $request)
	{
		$getrecord = TotalTimeModel::orderBy('id', 'desc')->select('total_times.*');

        $getrecord = $getrecord->join('users', 'total_times.user_id', '=', 'users.id');
          $getrecord = $getrecord->join('playlist', 'total_times.playlist_id', '=', 'playlist.id');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('total_times.id', '=', $request->idsss);
        }
        if ($request->user_id) {
            $getrecord = $getrecord->where('users.firstname', 'like', '%' . $request->user_id . '%');
        }
        if ($request->playlist_id) {
            $getrecord = $getrecord->where('playlist.playlist_name', 'like', '%' . $request->playlist_id . '%');
        }
        

        // Search Box End


        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;
        //time count start
        // $dkdkdk = TotalTimeModel::sum('total_time');
        // dd($dkdkdk);
        $total_time = TotalTimeModel::sum(DB::raw("TIME_TO_SEC(total_time)"));
        $data['totalTime'] = $total_time;
        // dd($data['totalTime']);

        // $total_time = TimeTrack::where('playlist_id', $id)->sum(DB::raw("TIME_TO_SEC(total_time)"));


        //time count End

		$data['meta_title'] = 'Total Time List';
		return view('backend.total_time.list', $data);
	}


	public function total_time_destroy($id)
	{
		 $user_update = TotalTimeModel::get_single($id);
         $user_update->delete();
         return redirect()->back()->with('error', 'Record successfully deleted!');
	}




}