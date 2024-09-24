<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Member;
use App\Models\Baptism;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeaconController extends Controller
{
     public function showDeacon(){

        $user = Auth::user();
          if(!$user){
               return redirect()->route('login');
          }
        $members = Member::where('supervisor_id',$user->id)->get();
        
        $totalMembers = Member::where('supervisor_id',$user->id)->count();
        
        $males = Member::where('supervisor_id',$user->id)
                       ->where('gender','male')->count(); 
        
        $females = Member::where('supervisor_id',$user->id)
                       ->where('gender','female')->count(); 
                       
        $kidsTotal = Member::where('supervisor_id',$user->id)
                       ->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [0, 17])->count();              
                       
        
        $kidsMale = Member::where('supervisor_id',$user->id)
                       ->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [0, 17])             
                       ->where('gender','male')->count(); 
        
        $kidsFemale = Member::where('supervisor_id',$user->id)
                       ->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [0, 17])             
                       ->where('gender','female')->count(); 
                       
        $baptisms = Baptism::all();
       
        if($user->isDeacon()){
        
        return view('deacon',compact('user','members','totalMembers','males','females','kidsTotal','kidsMale','kidsFemale','baptisms'));
        
          }
     return redirect()->route('index');

     }

     public function getMember($id)
{
    // Retrieve member data by ID
    $member = Member::find($id);
    
    // You can include relationships if needed, e.g., supervisor's name
    $supervisor = User::find($member->supervisor_id);
    
    return response()->json([
        'fname' => $member->fname,
        'lname' => $member->lname,
        'phone' => $member->phone,
        'gender' => $member->gender,
        'email' => $member->email,
        'address' => $member->address,
        'marital_status' => $member->marital_status,
        'supervisor_name' => $supervisor->name,
    ]);
}

}
