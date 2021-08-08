<?php

namespace App\Http\Controllers\Backend;
// use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BuyNowModel;


class BuyNowController extends Controller
{
	public function buy_now_index(Request $request)
	{

		  $getrecord = BuyNowModel::orderBy('id', 'desc')->select('buy_now.*');

           $getrecord = $getrecord->join('users', 'buy_now.user_id', '=', 'users.id');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('buy_now.id', '=', $request->idsss);
        }
        if ($request->user_id) {
            $getrecord = $getrecord->where('users.firstname', 'like', '%' . $request->user_id . '%');
        }

        
    
        
        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;
		$data['meta_title'] = 'Buy Now List';
		return view('backend.buy_now.list', $data);
	}

	public function buy_now_destroy($id){
		$deleteRecord = BuyNowModel::get_single($id);
        $deleteRecord->delete();
       
       

        return redirect()->back()->with('error', 'Record successfully deleted!');
	}

 public function changeStatus(Request $request) {


        $order = BuyNowModel::find($request->order_id);
        $order->buy_state = $request->status_id;
        $order->save();

        $json['success'] = true;
        echo json_encode($json);



    }

}

?>