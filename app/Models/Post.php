<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function reviews(){
        return $this->hasMany(Rate::class,'post_id','id');
    }
    public function hasReview($id){
        $arr=$this->reviews;
        foreach ($arr as $item){
            if($item->user_id==$id){
                return $item;
            }
        }
        return null;
    }
}
