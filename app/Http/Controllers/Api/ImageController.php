<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use JetBrains\PhpStorm\NoReturn;

class ImageController extends Controller
{

    /**
     * 给博客提供的随机图片API
     */
    #[NoReturn] public function randomBlog(){
        $img_array = glob("D:\pic\*.{gif,jpg,png}",GLOB_BRACE);
        $img = array_rand($img_array);
        header('Location: https://cdn.yuxuan66.com/yuxuan/blog/img/'.str_replace('D:\pic\\','',$img_array[$img]));
        exit;
    }

}
