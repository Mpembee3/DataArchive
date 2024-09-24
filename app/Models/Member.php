<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

protected $fillable = ['fname','lname','phone','gender','email','address','birthdate','marital_status','supervisor_id','family_id'];
    
        public function user(){

            return $this->hasOne(User::class, 'member_id');
        }

        public function supervisor(){

            return $this->belongsTo(User::class,'supervisor_id');
        }

        public function family(){

            return $this->belongsTo(Family::class);
        }

        public function family_head(){

            return $this->hasOne(Family::class);
        }

        public function baptism(){

            return $this->hasOne(Baptism::class);
        }

        public function  death(){

            return $this->hasOne(Death::class);

        }
       
        public function transfer(){

            return $this->hasOne(Transfer::class);
        }

        public function marriageAsHusband(){

            return $this->hasOne(Marriage::class,'husband');
        }

        public function marriageAsWife(){

            return $this->hasOne(Marriage::class,'wife');
        }
}
