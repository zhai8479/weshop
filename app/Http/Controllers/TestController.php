<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/11/24
 * Time: 10:48
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        return $this->array_response(['lang' => __('message.hello')]);
    }
}