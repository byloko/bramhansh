<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BuyNowModel extends Model
{
    protected $table = 'buy_now';

	static public function get_single($id){
		return self::find($id);
	}

	public function getUserName(){
      return $this->belongsTo(User::class, "user_id");
   }
   
}
