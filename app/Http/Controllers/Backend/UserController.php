<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BuyNowModel;
use App\Models\TotalTimeModel;
use Hash;
use DB;

class UserController extends Controller
{
    
    public function user_index(Request $request)
    {
        $getrecord = User::where('is_admin','=', 0)->orderBy('id', 'desc');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('users.id', '=', $request->idsss);
        }
        if ($request->firstname) {
            $getrecord = $getrecord->where('users.firstname', 'like', '%' . $request->firstname . '%');
        }
    
        if ($request->email) {
            $getrecord = $getrecord->where('users.email', 'like', '%' . $request->email . '%');
        }
        if ($request->country) {
            $getrecord = $getrecord->where('users.country', 'like', '%' . $request->country . '%');
        }
         if ($request->lastname) {
            $getrecord = $getrecord->where('users.lastname', 'like', '%' . $request->lastname . '%');
        }
         if ($request->age) {
            $getrecord = $getrecord->where('users.age', 'like', '%' . $request->age . '%');
        }
        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;

        $data['meta_title'] = 'User List';
        return view('backend.user.list', $data);
    }

    public function user_create(Request $request){
        $data['meta_title'] = 'Add User';
        return view('backend.user.add', $data);
    }

    public function user_store(Request $request)
    {

       $insert_r = request()->validate([
          //'username'            => 'required|alpha_dash|unique:users',
          'email'          => 'required|unique:users',
          'firstname'            => 'required|unique:users',
          //'mobile'                => 'required|unique:users|digits:10|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            //'mobile' => 'required|unique:users|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
       //   'mobile' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
          //  'alternate_number' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
       ]);


      $insert_r                   = new User;
      $insert_r->firstname             = trim($request->firstname);
      
      $insert_r->email            = trim($request->email);
      $insert_r->lastname         = trim($request->lastname);
      $insert_r->country           = trim($request->country);
      $insert_r->age              = trim($request->age);
    
      $insert_r->password = Hash::make($request->password);
   
      $insert_r->save();
      return redirect('admin/user')->with('success', 'Record successfully register.');

    }

    public function user_edit($id, Request $request){
        $data['getrecord'] = User::get_single($id);
        $data['meta_title'] = 'Edit User';
        return view('backend.user.edit', $data);
    }

    public function user_update(Request $request, $id)
    {
        $user_update = User::get_single($id);
        $user_update->firstname = $request->firstname;
        if(!empty($request->password)){
          $user_update->password = Hash::make($request->password);
        }
        $user_update->lastname = $request->lastname;
        $user_update->age = $request->age;
        $user_update->country = $request->country;

        $user_update->save();
        return redirect('admin/user')->with('success', 'Record successfully update.');
    }

    
    public function user_destroy($id)
    {
        $deleteRecord = User::get_single($id);
        $deleteRecord->delete();

        BuyNowModel::where('user_id','=',$id)->delete();

        return redirect()->back()->with('error', 'Record successfully deleted!');
    }


    public function user_view($id){
       $data['getrecord'] = User::get_single($id);

        $totalTime = TotalTimeModel::sum(DB::raw("TIME_TO_SEC(total_time)"));
        $data['totalTime'] = $totalTime;
        $data['meta_title'] = 'View User';
        return view('backend.user.view', $data);
    }

}

?>