<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\Models\PostCategory;
use App\Models\Role;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PharIo\Manifest\Application;

class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'role:'.Role::SUPER_ADMIN.'|'.Role::ADMIN.'|'.Role::SUPER_PUBLISHER.'|'.Role::PUBLISHER.'|'.Role::EDITOR
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index():Factory|View|Application
    {
        return view('bo.post_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $postCategory = new PostCategory();
        return view('bo.post_categories.create', compact('postCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(PostCategoryRequest $request): RedirectResponse
    {
        $category = PostCategory::create($request->validated());

        return redirect()
            ->route('bo.post_categories.index')
            ->with('success', __('post_categories.message_created', ['name' => $category->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  PostCategory  $postCategory
     * @return RedirectResponse
     */
    public function show(PostCategory $postCategory): RedirectResponse
    {
        return redirect()->route('bo.post_categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostCategory $postCategory
     * @return View
     */
    public function edit(PostCategory $postCategory): View
    {
        return view('bo.post_categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostCategoryRequest $request
     * @param PostCategory $postCategory
     * @return RedirectResponse
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory): RedirectResponse
    {
        $postCategory->update($request->validated());

        return redirect()
            ->back()
            ->with('success', __('post_categories.message_update', ['name' => $postCategory->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PostCategory  $postCategory
     * @return mixed
     */
    public function destroy(PostCategory $postCategory): mixed
    {
        if ($postCategory->delete()) {
            return redirect()
                ->route('bo.post_categories.index')
                ->with('success', __(
                    'post_categories.message_deleted',
                    ['name' => $postCategory->name,]
                ));
        }
        return redirect()
            ->route('bo.post_categories.index')
            ->with('error', __(
                'post_categories.message_delete_error',
                ['name' => $postCategory->name,]
            ));
    }
}
