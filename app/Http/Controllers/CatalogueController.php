<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::orderBy('created_at', 'desc')->get();
        $title = ' - '.__('front.our_catalogues');

        return view('catalogues')
            ->with('catalogues', $catalogues)
            ->with('title', $title);
    }

    public function show(Catalogue $catalogue)
    {
    }
}
