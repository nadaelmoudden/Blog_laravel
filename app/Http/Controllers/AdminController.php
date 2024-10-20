<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user = Auth()->user();
        $userId = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;

        $post->title = $request->title;

        $post->description = $request->description;

        $post->post_status = 'active';

        $post->user_id = $userId;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully!');
    }

    public function show_post()
    {
        $posts = Post::all();
        return view('admin.show_post', compact('posts'));
    }

    public function delete_post($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('message','Post Deleted Succesfully !');
    }

    public function edit_page($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Updated Successfully!');
    }

    public function accept_post($id)
    {
        $post = Post::findOrFail($id);
        $post->post_status = 'active';
        $post->save();
        return redirect()->back()->with('message', 'Post Status Change To Active');
    }

    public function reject_post($id)
    {
        $post = Post::findOrFail($id);
        $post->post_status = 'rejected';
        $post->save();
        return redirect()->back()->with('message', 'Post Status Changed To Rejected');
    }

}
