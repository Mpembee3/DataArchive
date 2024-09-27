<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use App\Models\Baptism;
use App\Models\Marriage;
use App\Models\Role;
use App\Models\Event;
use App\Models\Family;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdmin(){
        
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }

        $members = Member::all();
        $users = User::all();
        $events = Event::all();
        $memberTotal = Member::all()->count();
        $familyTotal = Family::all()->count();
        $baptismTotal = Baptism::all()->count();
        $marriageTotal = Marriage::all()->count();
        $events = Event::where('start_date','>=',now())
                            ->orderBy('start_date','asc')
                            ->limit(6)->get();

    return view('admin',compact('members','users','user','memberTotal','familyTotal','baptismTotal','marriageTotal','events'));

    }

    public function showUsers(){
           $user = Auth::user();
           $users = User::all();
           $roles  = Role::all();
     return view('users',compact('users','roles','user'));

    }

    public function showMembers(){

        $user = Auth::user();
        $roles = Role::all();
        $users = User::all();
        $members = Member::all();

        // dd($members);      
        $members = Member::select('members.*', 'supervisor.fname as supervisor_fname', 'supervisor.lname as supervisor_lname')
        ->leftJoin('members as supervisor', 'members.supervisor_id', '=', 'supervisor.id') // Self-join to get supervisor's details
        ->get(); 

        $families = Family::all(); 
     
        
        return view('tables.members',compact('user','members','users','families','roles'));
    }

    public function showEditMember($id){
        $member = Member::find($id);
        $user = Auth::user();
        $users = User::all();
        $families = Family::all();

        return view('edit.members',compact('user','users','families','member'));
    }

    public function addMember(Request $request){

         Member::create([

          'fname' => $request->fname,
          'lname' => $request->lname,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'gender' => $request->gender,
          'birthdate' => $request->birthdate,
          'marital_status' => $request->marital_status,
          'family_id' => $request->family_id,
          'supervisor_id' => $request->supervisor_id,

         ]);

         return redirect()->route('members')->with('success', 'Member added successfully');

    }

    public function updateMember(Request $request,$id){

        $member = Member::findOrFail($id);

         $member->update([

          'fname' => $request->fname,
          'lname' => $request->lname,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'gender' => $request->gender,
          'birthdate' => $request->birthdate,
          'marital_status' => $request->marital_status,
          'family_id' => $request->family_id,
          'supervisor_id' => $request->supervisor_id,

         ]);   

        return redirect()->route('members')->with('success','member updated');

          }

    public function showFamilies(){

        $user = Auth::user();
        $members = Member::all();   
        $families = Family::all();
        $total = Family::all()->count();
    
        return view('tables.families',compact('user','members','families','total'));
    }

    public function showBaptism(){

         $user = Auth::user();
         $members = Member::all();
         $baptisms = Baptism::all();
         $total = Baptism::all()->count();

      return view('tables.baptism',compact('user','members','baptisms','total'));

    }

    public function addBaptism(Request $request){

        $baptism = Baptism::create([
     
            'member_id' => $request->member_id,
            'date'    => $request->date,
        
        ]);

        return redirect()->route('baptism')->with('success', 'Baptism added successfully');

    }

    public function addFamily(Request $request){

             $family = Family::create([

            'name' => $request->name,
            'family_head' => $request->family_head,
        ]);

        return redirect()->route('families')->with('success','New Family added');

    }

    public function edit($id){

      $user = User::find($id);
      $roles = Role::all();

      return view('edit',compact('user','roles'));

    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);
        
        $request -> validate([

            'email' => 'required|email|max:40',
            'role'  => 'required|exists:roles,id',
        ]);

        $user->update([

            'email' => $request->email,
            'role_id'  => $request->role,
        ]);

        return redirect()->route('admin')->with('success','info updated successfully');

    }

    public function resetPassword(Request $request, $id){

        $user = User::findOrFail($id);

        if(!$user){

            return redirect()->back()->withErrors(['user','user not found']);
        }

        $defaultPassword = '2024@ubc';
        $user->password  = Hash::make($defaultPassword);
        $user->save();
         
        return redirect()->route('users')->with('success','password reset successfully');

    }

    public function dropUser($id){

        $user = User::findOrFail($id);
          if(!$user){
            return redirect()->back()->withErrors('user','no user found');
          }

        $user->delete();
        return redirect()->route('users')->with('success','user deleted successfully');
    }

    public function addUser(Request $request){

        

        $request -> validate([

            // 'email' => 'required|email|unique:members,email',
            // 'role_id' => 'required|exists:roles,id',

        ]);

        $member = Member::where('email', $request->email)->first();
         if(!$member){
            return redirect()->back()->withErrors(['email' => 'member with email dont exist']);
         }

        $defaultPassword = 'user12345';

        $user = User::create([
             
            'member_id' => $member->id,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($defaultPassword),

        ]);
         
        return redirect()->route('index');

    }

    public function showMarriages(){

        $user = Auth::user();
        $husbands = Member::where('gender','Male')->get();
        $wives = Member::where('gender','Female')->get();
       // $marriages = Marriage::with(['husband', 'wife'])->get();

       $marriages = Marriage::all()->map(function($marriage) {
        $marriage->husband = Member::find($marriage->husband);
        $marriage->wife = Member::find($marriage->wife);
        return $marriage;
      });
              
        
        return view('tables.marriages',compact('user','husbands','wives','marriages'));
}

    public function addMarriage(Request $request){

         Marriage::create([
  
           'husband' => $request->husband,
           'wife'    => $request->wife,
           'marriage_date' => $request->marriage_date,

         ]);

        return redirect()->route('marriages')->with('success','marriage addes successfully');
    }


//Events Methods

    public function showEvents(){

        $user = Auth::user();
        $events = Event::all();

     return view('tables.events',compact('user','events'));
    }

    public function addEvent(Request $request){

          Event::create([

            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,

          ]);
      return redirect()->route('events')->with('success','event added!');

    }

    public function updateEvent(Request $request,$id){

            $event = Event::findOrFail($id);

            $event->update([

            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            
            ]);

            return redirect()->route('events')->with('success','event added!');
    }

    public function deleteEvent($id){

        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('events')->with('success','successful deletion');
    }

    public function showKids(){

        $user = Auth::user();

        $teens = Member::whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [10, 17])
                       ->get();  

        $kids = Member::whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [3, 9])
                       ->get();  

            return view('tables.kids',compact('user','teens','kids'));

    }
    
}
