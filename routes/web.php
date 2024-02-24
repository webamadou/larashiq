<?php

use App\Http\Controllers\Backend\AdminPanelController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ConfigurationController;
use App\Http\Controllers\Backend\EmailVerificationController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostCategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController as BoUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController as FrontPageController;
use App\Http\Controllers\PostController as FrontPostController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\UserController as FrontUserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\WelcomeNotification\WelcomesNewUsers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
})->name('home_page');*/

Route::get('/', [WelcomeController::class, 'index'])->name('home-page');

/* -- pages route */
Route::get('/page/{page:slug}', [FrontPageController::class, 'show'])->name('see-page');
Route::get('/pages/categorie/{slug}', [FrontPageController::class, 'indexCategory'])->name('see-page-category');// not in metas
/* -- posts route */
Route::get('/articles', [FrontPostController::class, 'index'])->name('blog');
Route::get('/article/{post:slug}', [FrontPostController::class, 'show'])->name('see-post');
Route::get('/articles/categorie/{slug}', [FrontPostController::class, 'indexCategory'])->name('see-post-categories');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/mon-compte', [FrontUserController::class, 'myAccount'])->name('mon-compte');
});
// route to redirect to with message to activate email
Route::get('/email/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

// Email verification handler
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->name('verification.verify');

Route::get('/home', [WelcomeController::class, 'index'])->name('home');
Route::get('/verified', [HomeController::class, 'verified'])->name('verified');

// Routes pour les users creer en backoffice avec demande de creation de password
Route::group(['middleware' => ['web', WelcomesNewUsers::class,]], function () {
    Route::get('welcome/{user}', [WelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [WelcomeController::class, 'savePassword']);
});

Route::get('/social-media-share', [SocialShareButtonsController::class,'shareWidget']);
// site map

// Groupe de routes qui n'ecessitent que le user soit verifie
Route::middleware(['auth'])->group(function () {
    Route::get('/rebuild_design', [AdminPanelController::class, 'rebuild'])->name('rebuild');
    Route::get('admin', [AdminPanelController::class, 'index'])->name('backoffice');

    // Le groupe-route suivant regroupe les routes du backoffice
    Route::prefix('backoffice')
        ->name('bo.')
        ->group(function () {
            Route::resource('configurations', ConfigurationController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('post_categories', PostCategoryController::class);
            Route::resource('cities', CityController::class);
            Route::resource('pages', PageController::class);
            Route::post('/pages/image/{image}', [PageController::class, 'destroyImage'])
                ->name('pages.destroy_image');
            Route::resource('posts', PostController::class);
            Route::resource('roles', RoleController::class);
            Route::resource('users', BoUserController::class);
        });
});
