<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PlaylistModel;
use App\Models\VideoModel;
use Hash;


class PlaylistController extends Controller
{
    
    public function playlist_index(Request $request)
    {
        $getrecord = PlaylistModel::orderBy('id', 'desc')->select('playlist.*');

           $getrecord = $getrecord->join('program', 'playlist.program_id', '=', 'program.id');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('playlist.id', '=', $request->idsss);
        }
        if ($request->playlist_name) {
            $getrecord = $getrecord->where('playlist.playlist_name', 'like', '%' . $request->playlist_name . '%');
        }

          if(!empty($request->program_id)){
            $getrecord = $getrecord->where('program.program_name', 'like', '%' . $request->program_id . '%');
        }
    
        
        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;

        $data['meta_title'] = 'Playlist List';
        return view('backend.playlist.list', $data);
    }

    public function playlist_destroy($id)
    {
         $deleteRecord = PlaylistModel::get_single($id);
        $deleteRecord->delete();

        VideoModel::where('video.playlist_id','=',$id)->delete();

        return redirect()->back()->with('error', 'Record successfully deleted!');
    }

    public function playlist_edit($id, Request $request)
    {
        $data['getrecord'] = PlaylistModel::get_single($id);
        $data['meta_title'] = 'Edit Playlist';
        return view('backend.playlist.edit', $data);
    }

    public function playlist_update($id, Request $request){
        $user_update = PlaylistModel::get_single($id);
        $user_update->playlist_name = $request->playlist_name;
        $user_update->save();
        return redirect('admin/playlist')->with('success', 'Record successfully update.');
    }

}

?>