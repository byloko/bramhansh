<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoModel;
use App\Models\ProgramModel;
use App\Models\PlaylistModel;
use Hash;
use File;
use Str;


class VideoController extends Controller
{
    
    public function video_index(Request $request)
    {
        $getrecord = VideoModel::orderBy('id', 'desc')->select('video.*');

         $getrecord = $getrecord->join('program', 'video.program_id', '=', 'program.id');
         $getrecord = $getrecord->join('playlist', 'video.playlist_id', '=', 'playlist.id');

        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('video.id', '=', $request->idsss);
        }
        if ($request->video_title) {
            $getrecord = $getrecord->where('video.video_title', 'like', '%' . $request->video_title . '%');
        }
    
      
        if(!empty($request->program_id)){
            $getrecord = $getrecord->where('program.program_name', 'like', '%' . $request->program_id . '%');
        }
    
        if(!empty($request->playlist_id)){
            $getrecord = $getrecord->where('playlist.playlist_name', 'like', '%' . $request->playlist_id . '%');
        }
    
    
        
        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;

        $data['meta_title'] = 'Video List';
        return view('backend.video.list', $data);
    }

    public function video_create(Request $request){
        $data['getProgramRecord'] = ProgramModel::get();
        $data['meta_title'] = 'Add Video';
        return view('backend.video.add', $data);   
    }

    public function video_store(Request $request){
        $insert_r                   = new VideoModel;
        $insert_r->program_id     = trim($request->program_id);
        $insert_r->playlist_id     = trim($request->playlist_id);
        $insert_r->video_title     = trim($request->video_title);
        
        if (!empty($request->file('video_url'))) {
            $ext            = 'mp4';
            $file           = $request->file('video_url');
            $randomStr      = Str::random(30);
            $filename       = $randomStr . '.' . $ext;
            $file->move('upload/', $filename);
            $insert_r->video_url = $filename;
            // $file->move('upload/', $filename);
            //$path = "http://localhost/laravel/bookdepot/upload/book/".$filename;
            //$path = "http://vbsd.co.in/bookdepot/upload/book/".$filename;
            //$insert_r->video_url = $path;
        }

        $insert_r->save();
        return redirect('admin/video')->with('success', 'Record successfully register.');
    }

    public function get_play_list_dropdown(Request $request)
    {
        $html =  '';
        $getCategory = PlaylistModel::where('program_id', '=', $request->id)->get();

        $html .= '<option value="">Select Playlist Name</option>';

        foreach ($getCategory as $key => $value) {
            $html .= '<option value="'.$value->id.'">'.$value->playlist_name.'</option>';            
        }

        $json['success'] = $html;
        echo json_encode($json);

    }

    public function video_edit($id, Request $request){
        $data['getProgramRecord'] = ProgramModel::get();
         $getrecord = VideoModel::get_single($id);

         $data['getPlaylist'] = PlaylistModel::where('program_id', '=', $getrecord->program_id)->get();

        $data['getrecord'] = $getrecord;
        $data['meta_title'] = 'Edit Video';
        return view('backend.video.edit', $data);   
    }

    public function video_update($id, Request $request){
        $user_update = VideoModel::get_single($id);
        $user_update->program_id     = trim($request->program_id);
        $user_update->playlist_id     = trim($request->playlist_id);
        $user_update->video_title     = trim($request->video_title);
        //$user_update->video_url       = trim($request->video_url);

        if (!empty($request->file('video_url'))) {
            if(!empty($user_update->video_url) && file_exists('upload/'.$user_update->video_url)){
                unlink('upload/'.$user_update->video_url);
            }
            $ext            = 'mp4';
            $file           = $request->file('video_url');
            $randomStr      = Str::random(30);
            $filename       = $randomStr . '.' . $ext;
            $file->move('upload/', $filename);
            $user_update->video_url = $filename;
            //$file->move('upload/book/', $filename);
            //$path = "http://localhost/laravel/bookdepot/upload/book/".$filename;
            //$path = "http://vbsd.co.in/bookdepot/upload/book/".$filename;
            //$user_update->book_image = $path;
        }

        $user_update->save();

     

        return redirect('admin/video')->with('success', 'Record successfully update.');

    }

    public function video_destroy($id){
         $user_update = VideoModel::get_single($id);
         $user_update->delete();
         return redirect()->back()->with('error', 'Record successfully deleted!');
    }

}

?>