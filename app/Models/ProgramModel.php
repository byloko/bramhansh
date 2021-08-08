<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProgramModel extends Model
{
    protected $table = 'program';

	static public function get_single($id){
		return self::find($id);
	}

	  public function option() {
		return $this->hasMany(PlaylistModel::class, "program_id");
	}
   
}
