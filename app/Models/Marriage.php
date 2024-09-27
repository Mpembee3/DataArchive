<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Member;

class Marriage extends Model
{
    use HasFactory;

    protected $fillable = ['husband','wife','marriage_date'];


       public function husband(){

        return $this->belongsTo(Member::class,'husband', 'id');

       }

       public function wife(){

        return $this->belongsTo(Member::class,'wife', 'id');

       }

    //    public function getHusbandIdAttribute()
    // {
    //     return $this->attributes['husband'];
    // }
    
    // public function getWifeIdAttribute()
    // {
    //     return $this->attributes['wife'];
    // }
}
