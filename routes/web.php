<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NotificationsController;

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

Route::get('/test', function () {
    $users = \App\Models\User::with('roles')->orderBy('name','ASC')->whereKeyNot(1)->get();
    $collection = collect($users);
    $data = $collection->map(function($item){
        $item->roles = collect($item->roles);
        $itemCollection = collect($item)->only(['name','email','username','roles']);
        $itemCollection->put('actions', action_buttons('users', $item->id));
        return $itemCollection->all();
     });
    $data = $data->all();
    // $data = $collection->all();
    // $data = encodeId(1);
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Auth::routes();

/**
 * Home Routes
 */
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/posts', 'posts')->name('posts');
});

Route::group(['middleware' => 'auth'], function () {
    /**
     * Dashboard Route
     */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /**
     * User Profile Routes
     */
    Route::controller(UserProfileController::class)->prefix('profile')->group(function () {
        Route::get('/', 'index')->name('profile');
        Route::get('/edit', 'edit')->name('profile.edit');
    });

    /**
     * Routes with permissions
     */
    Route::group(['middleware' => 'permission'], function () {
        /**
         * Users Routes
         */
        Route::controller(UsersController::class)->prefix('users')->group(function () {
            Route::get('/', 'index')->name('users.index');
            Route::get('/create', 'create')->name('users.create');
            Route::post('/create', 'store')->name('users.store');
            Route::get('/{user}/show', 'show')->name('users.show');
            Route::get('/{user}/edit', 'edit')->name('users.edit');
            Route::patch('/{user}/update', 'update')->name('users.update');
            Route::delete('/{user}/delete', 'destroy')->name('users.destroy');
            Route::get('/list', 'list')->name('users.list');

            Route::bind('user', function($user, $route)
            {
                return decodeId($user);
            });

        });

        /**
         * Posts Routes
         */
        Route::controller(PostsController::class)->prefix('posts')->group(function () {
            Route::get('/', 'index')->name('posts.index');
            Route::get('/create', 'create')->name('posts.create');
            Route::post('/create', 'store')->name('posts.store');
            Route::get('/{post}/show', 'show')->name('posts.show');
            Route::get('/{post}/edit', 'edit')->name('posts.edit');
            Route::patch('/{post}/update', 'update')->name('posts.update');
            Route::delete('/{post}/delete', 'destroy')->name('posts.destroy');
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });

    Route::match(['get', 'post'], '/navbar/search', [SearchController::class, 'showNavbarSearchResults']);

    Route::get('notifications/get', [NotificationsController::class, 'getNotificationsData'])
        ->name('notifications.get');
});
