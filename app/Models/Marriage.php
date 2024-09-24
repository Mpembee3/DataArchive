<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
    use HasFactory;

    protected $fillable = ['husband','wife','marriage_date'];


       public function husband(){

        return $this->belongsTo(Member::class,'husband');

       }

       public function wife(){

        return $this->belongsTo(Member::class,'wife');

       }
}
