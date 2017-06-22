<?php

namespace App\Http\Controllers;
use App\Category;
use App\Photo;
use App\User;
use App\Post;
use App\Http\Requests\PostsCreateRequest;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            // assignthe name to the photo
            $name = time() . $file->getClientOriginalName();
            //to move the photo to directory
            $file->move('images', $name);
            //create the photo onthe table
            $photo = Photo::create(['file'=>$name]);
            // to assign the new photo id to the post
            $input['photo_id'] =$photo->id;
    }


        $user->posts()->create($input);
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
//            $post = Auth::user()->posts()->whereId($id)->first();
//
//            $update = Post::findOrFail($post)->photo_id;
//
//            $photo = Photo::whereId($update)->first()->update(['file'=>$name]);

//            $photo = Photo::create(['file'=>$name]);
//
//            $input['photo_id'] = $photo->id;
        }
        Auth::user()->posts()->whereId($id)->first()->update($input);
        return redirect('/admin/posts');
//        Auth::user()->posts()->whereId($id)->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $photo = $post->photo_id;
        $delete = Photo::findorFail($photo);
        unlink(public_path() . $post->photo->file);
        $delete->delete();
        $post->delete();
        return redirect('/admin/posts');
    }

    public function post ($slug) {
        $post = Post::where('slug',$slug)->first();
//        $post = Post::find($id);
//        return $post;
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post', compact('post','comments'));
    }
}
