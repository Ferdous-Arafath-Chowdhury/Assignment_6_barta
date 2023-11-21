<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //

    public function add_post(Request $req)
    {
        // dd($req->all()); 

        $validate_data = $req->validate([
            'barta' => ['required'],
            
        ]);

        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();
        // dd($user->name);

        $inserted = DB::table('posts')->insert([
            'description' => $req->barta,
            'posted_by' => $user->name,
            'user_id' => $user->id,
        ]);  
        
        $post = DB::table("posts")->orderBy('id' , 'desc')->first();
        return view('post',['post' => $post]);
       


    } 


    public function edit_post($id)
    {
        $post = DB::table("posts")
        ->where('id', $id)->first();
        return view('edit_post' , ['post' => $post]);
    }

    public function update(Request $request, $post_id)
    {
        
        $request->validate([
            'barta' => 'required|string|max:255', 
        ]);

        
        DB::table('posts')->where('id', $post_id)->update([
            'description' => $request->input('barta'),
           
        ]);

        // Redirect to a page (you can change this to your needs)
        return redirect()->back()->with('success', 'Post updated successfully');
    } 

    public function delete_post($id)
    {
        $post = DB::table("posts")
        ->where('id', $id)->first();
        return view('delete_post' , ['post' => $post]);
    }

    public function destroy($post_id)
    {
      
        $post = DB::table('posts')->where('id', $post_id)->first();

      
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

       
        DB::table('posts')->where('id', $post_id)->delete();

     
        return redirect()->back()->with('success1', 'Post deleted successfully');
    }


   
}
