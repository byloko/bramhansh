<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramModel;
use App\Models\PlaylistModel;
use App\Models\VideoModel;
use Hash;


class ProgramController extends Controller
{
    
    public function program_index(Request $request)
    {
        $getrecord = ProgramModel::orderBy('id', 'desc');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('program.id', '=', $request->idsss);
        }
        if ($request->program_name) {
            $getrecord = $getrecord->where('program.program_name', 'like', '%' . $request->program_name . '%');
        }
    
        
        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;

        $data['meta_title'] = 'Program List';
        return view('backend.program.list', $data);
    }


      public function program_create(Request $request){
        $data['meta_title'] = 'Add Program';
        return view('backend.program.add', $data);
    }

    public function program_store(Request $request)
    {

      $insert_r                   = new ProgramModel;
      $insert_r->program_name     = trim($request->program_name);
     
      $insert_r->save();

      if(!empty($request->option)) {   

            foreach ($request->option as $value) {

                if(!empty($value['playlist_name'])) {
                 
                    $option_ind = new PlaylistModel;    
                    $option_ind->program_id = $insert_r->id;
                    $option_ind->playlist_name     = !empty($value['playlist_name']) ? $value['playlist_name'] : '';
                    $option_ind->save();  

                }
            }
        }


      return redirect('admin/program')->with('success', 'Record successfully register.');

    }

    public function program_edit($id, Request $request){
        $data['getrecord'] = ProgramModel::get_single($id);
        $data['meta_title'] = 'Edit Program';
        return view('backend.program.edit', $data);
    }

    public function program_update(Request $request, $id)
    {
        $user_update = ProgramModel::get_single($id);
        $user_update->program_name = $request->program_name;
        $user_update->save();

        if(!empty($request->option)) {   

            foreach ($request->option as $value) {

                if(!empty($value['playlist_name'])) {

                    if(!empty($value['id'])) 
                    {
                        $option_ind = PlaylistModel::get_single($value['id']);
                    }
                    else 
                    {
                        $option_ind = new PlaylistModel;    
                        $option_ind->program_id = $user_update->id;
                    }    
                    $option_ind->playlist_name     = !empty($value['playlist_name']) ? $value['playlist_name'] : '';
                    $option_ind->save();  

                }
            }
        }

        return redirect('admin/program')->with('success', 'Record successfully update.');
    }

    
    public function program_destroy($id)
    {
        $deleteRecord = ProgramModel::get_single($id);
        $deleteRecord->delete();

        PlaylistModel::where('playlist.program_id','=',$id)->delete();
        VideoModel::where('video.program_id','=',$id)->delete();

        return redirect()->back()->with('error', 'Record successfully deleted!');
    }

    public function option_delete($id){
        $deleteRecord = PlaylistModel::get_single($id);
        $deleteRecord->delete();
       
        VideoModel::where('video.program_id','=',$id)->delete();

        return redirect()->back()->with('error', 'Record successfully deleted!');
    }

    public function program_show($id){
        $data['getrecord'] = ProgramModel::get_single($id);
        $data['meta_title'] = 'Edit Program';
        return view('backend.program.view', $data);
    }


}

?>