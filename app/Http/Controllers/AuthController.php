<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

   public function index() {
    $user = Auth::user(); 
    if(!$user){
       return redirect()->route('login');
       if($user->isAdmin()){
        return redirect()->route('admin');
       }
   }
       return view('index');
  }


    public function showLogin(){

        return view('login');
    }

    public function login(Request $request){
         
            $validateData = $request->validate([

            'email'  => 'required|string|email',
            'password' => 'required|string'

          ]);

          $credentials = $request->only('email','password');

          if(Auth::attempt($credentials)){
             $user = Auth::user();
             if($user->isAdmin()){

              return redirect()->route('admin');
             }
             if($user->isDeacon()){
        
              return redirect()->route('deacon');
             }
             
              

              return redirect()->route('index');  
          }

             return back()->withErrors(['email'=> 'invalid email','password' => 'incorrect password']);

    }

    public function showUSerReg(){

        $roles = Role::all();

        return view('regUser',compact('roles'));
      }

     
     
      public function createUser(Request $request){
         
        $validateData = $request->validate([
               'email'    => 'required|string|email|exists:members,email|unique:users,email',
               'password' => 'required|string|min:8|confirmed',
               'role_id'  => 'required|exists:roles,id',
              
        ]);
        
        $member = Member::where('email',$request->email)->first();

           if(!$member){
                 
            return redirect()->back()->withErrors(['email'=>'No users found']);       

           }

              $user = User::create([

                'member_id' =>  $member->id,
                'email'     =>  $request->email,
                'password'  =>  Hash::make($request->password),
                'role_id'   =>  $request->role_id,

              ]);

           return redirect()->route('index');
      }


      public function showResetPassword(){

       return view('password-reset');

      }

      // public function forgotPassword(){
        
      // }

      public function resetPassword(Request $request){

           $request->validate([

            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',

           ]);

           $user = User::where('email',$request->email)->first();
           $user->password = Hash::make($request->password);
           $user->save();

           return redirect()->route('login');

      }

    public function show(Member $member)
    {
        //
    }

    
     
     
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }

    public function logout(Request $request){
       
      Auth::logout();
      
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login');



    }
}
