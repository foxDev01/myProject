<?php

use App\Http\Controllers\Admin\Proj\StoreController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
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



Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index');
});
Route::group(['namespace' => 'Proj', 'prefix'=> 'proj' ], function() {
    Route::get('/', 'IndexController')->name('proj.index');
    Route::get('/{proj}', 'ShowController')->name('proj.show');

    Route::group(['namespace'=>'Comment', 'prefix'=> '{proj}/comments'], function() {
        Route::post('/', 'StoreController')->name('proj.comment.store');
    });
    Route::group(['namespace'=>'Like', 'prefix'=> '{proj}/likes'], function() {
        Route::post('/', 'StoreController')->name('proj.like.store');
    });
});

// получение категорий и ссылки на их проекты
Route::group(['namespace' => 'Category', 'prefix' =>'categories'], function() {
    Route::get('/', 'IndexController')->name('category.index');

    Route::group(['namespace'=>'Proj', 'prefix'=> '{category}/projs'], function() {
        Route::get('/', 'IndexController')->name('category.proj.index');
    });
});
// 
// ЛК
Route::group(['namespace' => 'Personal', 'prefix'=> 'personal', 'middleware' => ['auth']], function() {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function() {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function() {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{proj}', 'DeleteController')->name('personal.liked.delete');
    });


    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'] , function() {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
});
// 

// ПАНЕЛЬ АДМИНИСТРАТОРА
Route::group(['namespace' => 'Admin', 'prefix'=> 'admin', 'middleware' => ['auth','admin']], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Proj', 'prefix'=> 'proj'], function() {
        Route::get('/', 'IndexController')->name('admin.proj.index');
        Route::get('/create', 'CreateController')->name('admin.proj.create');
        Route::post('/', 'StoreController')->name('admin.proj.store');
        Route::get('/{proj}', 'ShowController')->name('admin.proj.show');
        Route::get('/{proj}/edit', 'EditController')->name('admin.proj.edit');
        Route::patch('/{proj}', 'UpdateController')->name('admin.proj.update');
        Route::delete('/{proj}', 'DeleteController')->name('admin.proj.delete'); // по правилам ларавел называют дестрой
    });

    Route::group(['namespace' => 'Category', 'prefix'=> 'category'], function() {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete'); // по правилам ларавел называют дестрой
    });

    Route::group(['namespace' => 'Tag', 'prefix'=> 'tags'], function() {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete'); // по правилам ларавел называют дестрой
    });
    Route::group(['namespace' => 'User', 'prefix'=> 'user'], function() {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete'); // по правилам ларавел называют дестрой
    });

});
// 
Auth::routes();