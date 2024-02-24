<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Role;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PharIo\Manifest\Application;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN.'|'.Role::ADMIN.'|'.Role::SUPER_PUBLISHER.'|'.Role::PUBLISHER]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index():Factory|View|Application
    {
        return view('bo.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $category = new Category();
        return view('bo.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        return redirect()
            ->route('bo.categories.index')
            ->with('success', __('categories.message_created', ['name' => $category->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return RedirectResponse
     */
    public function show(Category $category): RedirectResponse
    {
        return redirect()->route('bo.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('bo.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()
            ->back()
            ->with('success', __('categories.message_update', ['name' => $category->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return mixed
     */
    public function destroy(Category $category): mixed
    {
        if ($category->delete()) {
            return redirect()
                ->route('bo.categories.index')
                ->with('success', __(
                    'categories.message_deleted',
                    ['name' => $category->name,]
                ));
        }
        return redirect()
            ->route('bo.categories.index')
            ->with('error', __(
                'categories.message_delete_error',
                ['name' => $category->name,]
            ));
    }
}
