<?php

use App\Http\Controllers\PageController;
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

Route::get('/', 'TopicController@index')->name('root');

Auth::routes();

//顯示、編輯個人資料
Route::resource('users', 'UserController', ['only'=> ['show', 'update', 'edit']]);

//文章
Route::resource('topics', 'TopicController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
//文章上傳圖片
Route::post('upload_image', 'TopicController@uploadImage')->name('topics.upload_image');

//分類
Route::resource('categories', 'CategoryController', ['only' => ['show']]);

//回覆
Route::resource('replies', 'ReplyController', ['only' => ['store', 'destroy']]);

//通知列表
Route::resource('notifications', 'NotificationController', ['only' => ['index']]);
