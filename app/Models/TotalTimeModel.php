<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TotalTimeModel extends Model
{
    protected $table = 'total_times';

    
	static public function get_single($id){
		return self::find($id);
	}

	 public function getUserName(){
      return $this->belongsTo(User::class, "user_id");
   }

    public function getPlaylistName(){
      return $this->belongsTo(PlaylistModel::class, "playlist_id");
   }
	
   
}
