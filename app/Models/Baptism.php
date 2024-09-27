<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Baptism extends Model
{
    use HasFactory;

    protected $fillable = ['member_id','baptism_date'];

    public function member(){

        return $this->belongsTo(Member::class,'member_id');
    }
}
