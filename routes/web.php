<?php

use Inertia\Inertia;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FontendController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubCategoryController;

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

// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [FontendController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');



// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin midlreware

    // Category Route
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/category/update/{category}', [CategoryController::class, 'update']);
    Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy']);

    //subCategory Route

    Route::get('/subCategory/index', [SubCategoryController::class, 'index'])->name('subCategories.index');
    Route::get('/subCategory/create', [SubCategoryController::class, 'create']);
    Route::post('/subCategory/store', [SubCategoryController::class, 'store']);
    Route::get('/subCategory/edit/{subCategory}', [SubCategoryController::class, 'edit']);
    Route::post('/subCategory/update/{subCategory}', [SubCategoryController::class, 'update']);
    Route::get('/subCategory/destroy/{subCategory}', [SubCategoryController::class, 'destroy']);

    //News Route
    Route::get('/admin/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/create/news', [NewsController::class, 'create']);
    Route::post('/store/news', [NewsController::class, 'store']);
    Route::get('/edit/news/{news}', [NewsController::class, 'edit']);
    Route::post('/update/news/{news}', [NewsController::class, 'update']);
    Route::delete('/destroy/news/{news}', [NewsController::class, 'destroy']);

    //Jobs Route
    Route::get('/admin/jobs', [JobController::class, 'index'])->name('job.index');
    Route::get('/create/jobs', [JobController::class, 'create'])->name('create.job');
    Route::post('/store/jobs', [JobController::class, 'store'])->name('store.job');
    Route::get('/edit/job/{jobs}', [JobController::class, 'edit'])->name('edit.job');
    Route::post('/update/job/{job}', [JobController::class, 'update'])->name('update.job');
    Route::get('/destroy/job/{job}', [JobController::class, 'destroy'])->name('destroy.job');

    //site logo Update
    Route::get('/index/logo', [AdminController::class, 'indexLogo'])->name('indexLogo');
    Route::get('/create/logo', [AdminController::class, 'createLogo'])->name('createLogo');
    Route::post('/store/logo', [AdminController::class, 'storeLogo'])->name('storeLogo');
});


// get jobs by title id
Route::get('/jobs/{job}', [FontendController::class, 'getJobsByTitle'])->name('jobsByTitle');




// get news by categorye
Route::get('/category/{category}', [FontendController::class, 'getJobsByCategory'])->name('newsByCategory');

// get news by categorye
Route::get('/subcategory/{subcategory}', [FontendController::class, 'getJobsBySubCategory'])->name('newsBySubCategory');

Route::get('/jobType/{type}', [FontendController::class, 'getJobsByType'])->name('newsByType');



// lead news
Route::get('/featuredNews', [FontendController::class, 'featuredNews'])->name('featuredNews');



require __DIR__ . '/auth.php';
