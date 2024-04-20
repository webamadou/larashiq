<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Role;
use App\Utilities\ImagesUploader;
use Faker\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN.'|'.Role::ADMIN.'|'.Role::EDITOR]);
    }

    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('bo.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $post = new Post();
        $categories = PostCategory::pluck('name', 'id');
        return view('bo.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        unset($data['images']);
        if ($post = Post::create($data)) {
            if ($request->validated('images')) {
                $uploadingImage = new ImagesUploader($request, $post->id, get_class($post));
                $uploadingImage();
            }

            return redirect()
                ->route('bo.posts.index')
                ->with('success', __('posts.message_created', ['name' => $post->name]));
        }

        return redirect()
            ->back()
            ->with('error', __('posts.error_creating_page'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('bo.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        $categories = PostCategory::pluck('name', 'id');
        return view('bo.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest  $request
     * @param  Post $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        unset($data['images']);
        $post->update($data);
        if ($request->validated('images')) {
            // First we need to delete the current image if any
            if ($post->deletePageImage()) {
                $uploadingImage = new ImagesUploader($request, $post->id, get_class($post));
                [$ok, $message] = $uploadingImage();
            }
        }

        return redirect()
            ->back()
            ->with('success', __('posts.message_update', ['name' => $post->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return mixed
     */
    public function destroy(Post $post): mixed
    {
        if ($post->delete()) {
            return redirect()
                ->route('bo.posts.index')
                ->with('success', __(
                    'posts.message_deleted',
                    ['name' => $post->name,]
                ));
        }
        return redirect()
            ->route('bo.posts.index')
            ->with('error', __(
                'posts.message_delete_error',
                ['name' => $post->name,]
            ));
    }
}
