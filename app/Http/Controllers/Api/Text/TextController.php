<?php
namespace App\Http\Controllers\Api\Text;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

/**
 * 获取纯文本的数据
 */
class TextController extends Controller
{
    /**
     * 每日一言接口
     */
    public function oneDay(): JsonResponse
    {
        $response = Http::get("http://guozhivip.com/yy/api/api.php");
        $content = $response->body();
        $pattern = '/document\.write\("(.*)"\);/';
        preg_match($pattern, $content, $matches);

        if (count($matches) > 1) {
            $content = $matches[1];
            // 处理提取的内容
            return $this->success($content);
        } else {
           return $this->error('无法获取每日一言数据');
        }

    }

}
