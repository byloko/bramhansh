<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FeedBackModel extends Model
{
    protected $table = 'feed_back';

	static public function get_single($id){
		return self::find($id);
	}
   public function getUserName(){
      return $this->belongsTo(User::class, "user_id");
   }

   
}
