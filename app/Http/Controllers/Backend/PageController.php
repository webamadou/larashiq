<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Image;
use App\Models\Page;
use App\Models\Role;
use App\Utilities\ImagesUploader;
use Faker\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN.'|'.Role::ADMIN.'|'.Role::EDITOR]);
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View|Application
     */
    public function index():Factory|View|Application
    {
        return view('bo.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $page = new Page();
        return view('bo.pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return RedirectResponse
     */
    public function store(PageRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_default'] = 0;
        unset($data['images']);
        if ($page = Page::create($data)) {
        // if ($page = Page::first()) {
            $uploadingImage = new ImagesUploader($request, $page?->id, get_class($page));
            [$ok, $message] = $uploadingImage();

            if ($ok) {
                return redirect()
                    ->route('bo.pages.index')
                    ->with('success', __('pages.message_created', ['name' => $page->name]));
            }
        }

        return redirect()
            ->back()
            ->with('error', __('pages.error_creating_page'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     * @return View
     */
    public function show(Page $page): View
    {
        return view('bo.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page  $page
     * @return View
     */
    public function edit(Page $page): View
    {
        return view('bo.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PageRequest  $request
     * @param  Page  $page
     * @return RedirectResponse
     */
    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $data = $request->validated();
        unset($data['images']);
        $page->update($data);
        if ($request->validated('images')) {
            // First we need to delete the current image if any
            if ($page->deletePageImage()) {
                $uploadingImage = new ImagesUploader($request, $page->id, get_class($page));
                [$ok, $message] = $uploadingImage();
            }
        }

        return redirect()
            ->back()
            ->with('success', __('pages.message_update', ['name' => $page->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     * @return mixed
     */
    public function destroy(Page $page): mixed
    {
        if ($page->delete()) {
            return redirect()
                ->route('bo.pages.index')
                ->with('success', __(
                    'pages.message_deleted',
                    ['name' => $page->name,]
                ));
        }
        return redirect()
            ->route('bo.pages.index')
            ->with('error', __(
                'pages.message_delete_error',
                ['name' => $page->name,]
            ));
    }

    public function destroyImage(Image $image)
    {
    }
}
