<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class adminController extends Controller
{
    //
    public function index(){
            if(Auth::id()){
                //if someone is trying to login
                $userType = Auth()->user()->userType;
                //fetch the userType from users table, store it to $userType variable
            
                if($userType=='user'){
                    //if userType is user
                    return view('dashboard');
                    //from resources\views\profile\dashboard.blade.php
                }
                elseif($userType=='admin'){
                    //if userType is admin
                    return view('admin.index');
                    //create admin folder in views
                }

                else{
                    return redirect()->back();
                    //if no roles, return user to the same page
                }
            }
            
    }

    public function adminhome(){
        return view('admin.adminhome');
    }

    public function post_page(){
        return view('admin.post_page');
    }

    public function add_post(Request $request){
        $user=Auth()->user();
        //user as in the table

        $userId = $user->id;
        //fetching id from user table

        $name = $user->name;

        $userType = $user->userType;

        $post=new Post;
        // ^Post.php
        $post->title = $request->title;
        $post->description = $request->description;

        $post->post_status = 'active';

        $post->user_id = $userId;
        //column name, then userId from above

        $post->name = $name;

        $post->userType = $userType;
        //////////////////
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            //^will save the posted image on public/postimage
            $post->image = $imagename;
        }
        //////////////////

        $post->save();
        return redirect()->back()->with('message','Post Added Successfully!!');
    }

    public function show_post(){
        $post = Post::all();
        //declare variable $post, which will fetch all the datas in our database
        return view('admin.show_post', compact('post'));
                                    //^compact coz itll take datas in a form of arrays(?)
    }

    public function delete_post($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }

    public function edit_post($id){
        $post=Post::find($id);
        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id){
        // $post=Post::find($id);
        $data = Post::find($id);
        $data->title=$request->title;
        //update data, the second title comes from the "name" of the input field (edit_page.blade.php, line 42)
        $data->description=$request->description;
        $image=$request->image;
        // use the one in line 60
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            //^will save the posted image on public/postimage
            $data->image = $imagename;
            //taken from this file's line 76-79, replace it from $post to $data
        }

        $data->save();
        return redirect()->back()->with('message', 'Post Updated Successfully');
    }   

    public function accept_post($id){
        $data = Post::find($id);
        $data->post_status = 'active';
        $data->save();
        return redirect()->back()->with('message','Post Status Changed to Active');
    }

    public function reject_post($id){
        $data = Post::find($id);
        $data->post_status = 'rejected';
        $data->save();
        return redirect()->back()->with('message','Post Status Changed to Rejected');
    }
}
