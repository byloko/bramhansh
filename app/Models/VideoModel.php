<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class VideoModel extends Model
{
    protected $table = 'video';

	static public function get_single($id){
		return self::find($id);
	}

	public function getProgramName(){
      return $this->belongsTo(ProgramModel::class, "program_id");
   }
   public function getPlaylistName(){
      return $this->belongsTo(PlaylistModel::class, "playlist_id");
   }
   
}
