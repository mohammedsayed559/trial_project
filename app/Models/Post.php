<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
         //user_id->//التسميه هنا مهمه جدا لأن الفريمورك بت check automatically عن الfk اللي هو متسمي بنفس المسمي بتاع الuser table
    }

    //public function postCreator()
    //{
      //  return $this->belongsTo(User::class,'user_id');
        //هنا لازم ولابد تعرفه بالfk لأنه هيروح يدور علي fk بالاسم ده post_creator_id ومش هيلاقيه
    //}

}
