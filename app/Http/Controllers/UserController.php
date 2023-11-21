<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function add (Request $req)
    {
        $validate_data = $req->validate([
            'name' => ['required'], 
            'username' => ['required' , 'unique:users'],
            'email' => ['required', 'unique:users'],
            'password' => ['required' , 'min:6'],
        ]);
        

    $user = new User();
    $user->name = $req->name;
    $user->username = $req->username;
    $user->email= $req->email;
    $user->password = Hash::make($req->password);
    $user->save();

    $req->session()->flash('success', 'Student Added Successfully.');
    return redirect()->back();

    } 


    public function HandleLogin(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home'); 
        } 

        $req->session()->flash('error', 'Invalid credentials. Please try again.');
        return redirect()->back();
    } 


    public function profile()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();
        return view('profile' , ['user' => $user]);

    }
    public function edit_profile() 
    { 

        $id = Auth::id();

        $user = DB::table('users')->where('id', $id)->first();
        return view('edit_profile' , ['user' => $user]);


    } 

    public function update(Request $req, $id)
    {
        // Validate the request data here if needed
    
        $updateData = [
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'bio' => $req->bio,
        ];
    
     
        DB::table('users')->where('id', $id)->update($updateData);
        
        return  redirect('profile');
    } 

    
    


}
