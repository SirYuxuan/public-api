<?php

use App\Http\Controllers\Api\BingController;
use App\Http\Controllers\Api\ImageController;
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
// 兼容老版本的API
Route::get('/images/bing/getWallpaper', [BingController::class, 'getWallpaper']);
// 提供给雨轩博客，随机显示目录中的照片
Route::get('/images/randomBlog', [ImageController::class, 'randomBlog']);
