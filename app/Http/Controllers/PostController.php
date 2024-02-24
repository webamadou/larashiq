<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View as ViewFacades;

class PostController extends Controller
{
    public function index()
    {
        $categ = null;
        $posts = Cache::remember(
            'all_posts_list',
            Config::get('cache.duration'),
            fn () => Post::orderBy('created_at', 'desc')->get()
        );
        $title = ' - '.__('front.post_title', ['categ' => '']);

        return view('articles', compact('categ', 'posts', 'title'));
    }

    public function show(Post $post)
    {
        $title = " - $post->name";
        $shareButtons = $this->renderShareButtonsPartial($post);
        return view('showPost', compact('post', 'title', 'shareButtons'));
    }

    public function indexCategory($category_slug)
    {
        $categ = Cache::remember(
            "posts_categories_{$category_slug}",
            Config::get('cache.duration'),
            fn () => PostCategory::where('slug', $category_slug)->first()
        );

        $posts = Cache::remember(
            "list_of_posts_of_category_{$category_slug}",
            Config::get('cache.duration'),
            fn () => Post::where('category_id', $categ?->id)->get()
        );

        $title = __('front.post_title');

        return view('articles', compact('categ', 'posts', 'title'));
    }

    public function renderShareButtonsPartial(Post $post): string
    {
        $shareButtons = \Share::page(
            route('see-page', $post->slug),
            $post->name,
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            /*->telegram()
            ->reddit()*/
            ->getRawLinks();

        return ViewFacades::make('partials.social-medias-share', ['shareButtons' => $shareButtons])->render();
    }
}
