<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\Estimation;
use App\Models\Page;
use App\Models\Post;
use App\Models\Property;

class AdminPanelController extends Controller
{
    public function index()
    {
        $allBiens = Post::all();
        $totalAlerts = Page::all()->count();
        $totalEstimations = 0;
        $tenLastEstimations = [];
        return view(
            'bo.admin.index_v3',
            compact(
                'tenLastEstimations',
                'totalAlerts',
                'totalEstimations',
                'allBiens'
            )
        );
    }

    public function rebuild()
    {
        return view('bo.admin.rebuild');
    }
}
