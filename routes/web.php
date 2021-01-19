<?php

use App\Http\Controllers\PostsController;
use App\Jobs\QueuedEmail;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');
Route::resource('posts', PostsController::class);

Route::get('/queue-jobs', function() {
    for ($i = 0; $i < 3; $i++) {
        dispatch(new QueuedEmail);
    }
});

Route::get('/create-posts', function() {
    Post::create([
        'title' => 'Hello world 1',
    ]);

    Post::create([
        'title' => 'Hello world 2',
    ]);

    Post::create([
        'title' => 'Hello world 3',
    ]);

    Post::create([
        'title' => 'Hello world 4',
    ]);

    Post::create([
        'title' => 'Hello world 5',
    ]);
});
