<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 2019/5/4
 * Time: 18:42
 */

namespace App\Http\Controllers\Message;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return [
            'status'=>1,
            'msg'=>'for index...',
        ];
    }
}
