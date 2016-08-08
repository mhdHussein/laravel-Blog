<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllCategories()
    {
        return Category::lists('name' , 'id')->all();
    }

    public function create()
    {

        // the all method is used to return an array version of the categories!
        $categories = $this->getAllCategories();

        return view('admin.posts.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $user = Auth::user();

        $input = $request->all();

        if($file = $request->photo_id){

                $name = time() . $file->getClientOriginalName();

                $file->move('images' , $name);

                $photo = Photo::create(['file' => $name]);

                $input['photo_id'] = $photo->id;

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
        $post = Post::findOrFail($id);
        $categories =$this->getAllCategories();

        return view('admin.posts.edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {

        $post = Post::findOrFail($id);

        $input = $request->all();

        $user = Auth::user();

        if($file = $request->photo_id){

            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;

        }

        $post->update($input);

        //update allowed by the author only
      //  $user->posts()->whereId($id)->first()->update($post);

        return redirect('admin/posts');


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

        unlink(public_path() . $post->photo->file);

        $post->delete();

        Session::flash('post_deleted' , 'Your Post has been deleted successfully');

        return redirect('admin/posts');

    }
}
