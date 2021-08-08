<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    static public function get_single($id)
    {
        return self::find($id);
    }

    public function get_time_details(){
   		return $this->hasMany(TotalTimeModel::class, "user_id");
    }

    public function getUserName(){
      return $this->belongsTo(User::class, "user_id");
   }

   public function getPlaylistName() {
		return $this->belongsTo(PlaylistModel::class, "program_id");
	}

}
