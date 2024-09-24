<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;

    protected $fillable = ['member_id','death_date'];

      public function member(){

          return $this->belongsTo(Member::class,'member_id');
      }
}
