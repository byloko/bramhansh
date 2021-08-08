<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PlaylistModel extends Model
{
    protected $table = 'playlist';

	static public function get_single($id){
		return self::find($id);
	}

	public function getProgramName(){
      return $this->belongsTo(ProgramModel::class, "program_id");
   }
   
}
