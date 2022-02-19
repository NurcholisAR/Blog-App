<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Symfony\Component\HttpFoundation\File\File;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.posts.index',
            [
                'title' => 'My Post',
                'posts' => Post::where('user_id', auth()->user()->id)->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'dashboard.posts.create',
            [
                'title'         => 'Create New Post',
                'categories'    => Category::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:5120',
            'body' => 'required'
        ]);

        // upload image
        $image = $request->file('image');
        if ($image) {
            // $validatedData['image'] = $image;
            $extension = $image->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/images/' . $validatedData['user_id'] = auth()->user()->id . '/' . $validatedData['slug'];
            $image->move($path, $fileName);
            $validatedData['image'] = $fileName;
            // return $fileName;
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // dd($validatedData)
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view(
            'dashboard.posts.show',
            [
                'title'  => $post->slug,
                'post'   => $post
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view(
            'dashboard.posts.edit',
            [
                'title'      => 'Edit ' . $post->title,
                'post'       => $post,
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:5120',
            'body' => 'required'
        ];
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension(); // you can also use file na
        $fileName = time() . '.' . $extension;
        if ($image) {
            $path = public_path() . '/images/' . $request->user_id . '/' . $request->category_id;
            if ($request->oldImage) {
                $fileOld = $path . '/' . $request->oldImage;
                // Storage::delete($fileOld);
                // Storage::disk('public')->delete($fileOld);
                dd(Storage::disk('public')->delete($fileOld));
                // unlink($fileOld);
            }
            $image->move($path, $fileName);
            // $path = public_path() . '/images';
            $validatedData['image'] = $fileName;
            // return $fileName;
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
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
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
