<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = ['name','family_head'];


       public function familyHead(){

         return $this->belongsTo(Member::class,'family_head');
       }

       public function members(){

        return $this->hasMany(Member::class);

       }
}
