<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BingController extends Controller
{

    /**
     * 获取最新的必应壁纸
     */
    public function getWallpaper(): void
    {
        $str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
        $str = json_decode($str,true);
        $imgUrl = 'http://cn.bing.com'.$str['images'][0]['url'];
        header('content-type:image/jpg;');
        echo file_get_contents($imgUrl);
    }

}
