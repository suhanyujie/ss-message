<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 2019/6/15
 * Time: 13:26
 */

namespace App\Http\Controllers\Tool;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    /**
     * 显示表格页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tool.exchangeRate.index');
    }

    public function count(Request $request)
    {
        $postData = $request->post();
        $salaryRate = $postData['salary-rate'] ?? 0;
        $currentRate = $postData['current-rate'] ?? 0;
        $salaryAmount = $postData['salary-amount'] ?? 0;
        if (empty($salaryRate) ||
            empty($currentRate) ||
            empty($salaryAmount)
        ) {
            return ['status'=>-1, 'msg'=>'请输入正确的数字！'];
        }
        // 1/$salaryRate = $res/$salaryAmount
        $shouldRes = bcdiv($salaryAmount,$salaryRate, 4);
        $actualRes = bcdiv($salaryAmount,$currentRate, 4);
        $diffAmount = bcsub($shouldRes, $actualRes, 4);

        var_dump($shouldRes, $actualRes, $diffAmount);die;
    }
}
