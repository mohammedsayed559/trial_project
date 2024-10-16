<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {


        $postsData = Post::get(); // SELECT * FROM posts & $postData is a collection object


        return view('posts.index',compact('postsData'));

    }

    public function show(Post $post)
    {
        // Route Model Binding
//    1-  $postData = Post::find($postID); // single model object
///*    2 */$postData = Post::where ('id',$postID)->first();  //single model object
//      eloquent builder -> $postData = Post::where('id',$postID);
///*    3 */$postData = Post::where ('id',$postID)->get();  //single model object
        //collection object  -> $postData = Post::where ('title','php')->get();
        return view('posts.show',compact('post'));
    }
    public function create()
    {
        $allUsers = User::get();

        return view('posts.create',compact('allUsers'));
    }
    public function store(PostRequest $request)
    {
        // code to validate Data from user
        $data = $request->validated();

        // 1- get the user data which the user entered in the form
        // automatically stored in $request
        // 2- store the user data in DB
        $post = new Post;

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->user_id = $data['user_id'];

        $post->save(); // executing the query which is 'INSERT INTO `posts` VALUES ()'


        // 3- redirect to /posts
        return redirect()->back()->with('success','Post added successfully');
    }
    public function edit(Post $post){

        // u can replace this "$postData = Post::findorfail($postid);" by this "edit(Post $post)"
        $users= User::get();
        return view('posts.edit',compact('post','users'));
    }
    public function update(PostRequest $request , $postID)
    {
        // 1- getting Post's data from the form not from DB
        $editedPostData = $request->validated();


        // 2- Getting the Post data From DB Then update $post by the new post's value which fetched from the form ($updatedPostData)
        $post = Post::findorfail($postID);
        // فا انا هنا ب update ال post$ بالقيمة الجديدة
        $post->update($editedPostData);
        // 3- redirect
        return to_route('posts.show',$postID)->with('update','Post updated successfully');

    }

    public function destroy($postID)
    {
        // 1- delete post from DB
        $post = Post::findorfail($postID);
        $post->delete();
        // 2- redirect to posts.index
        return redirect()->back()->with('delete','Post deleted successfully');

    }


}
