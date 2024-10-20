<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

use Alert;




class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            // $post = Post::all();
            $post = Post::where('post_status', '=', 'active')->get();

            $usertype = Auth()->user()->usertype;

            if($usertype == 'user')
            {
                return view('home.homepage', compact('post'));
            }

            else if($usertype == 'admin')
            {
                return view('admin.adminhome');
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        // $post = Post::all();
        $post = Post::where('post_status', '=', 'active')->get();
        return view('home.homepage', compact('post'));
    }

    public function post_details($id)
    {
        $post = Post::findOrFail($id);
        return view('home.post_details', compact('post'));
    }

    public function create_post()
    {
        return view('home.create_post');
    }

    public function user_post(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $userId;
        $post->name = $username;
        $post->usertype = $usertype;
        $post->post_status = 'pending';

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();

        Alert::success('Congrats', 'Your Post Added Successfully!');

        return redirect()->back();
    }

    public function my_post()
    {
        $user = Auth::user();
        $userId = $user->id;
        $post = Post::where('user_id', '=', $userId)->get();
        return view('home.my_post', compact('post'));
    }

    public function my_post_del($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully!');
    }

    public function post_update($id)
    {
        $data = Post::findOrFail($id);
        return view('home.post_update', compact('data'));
    }

    public function update_post_data(Request $request, $id)
    {
        $data = Post::findOrFail($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }

}
