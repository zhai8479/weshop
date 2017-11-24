<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
         * 0: 操作执行成功
         * 100: 一般错误
         * 101: 发送验证码错误
         * 102: 验证码错误
         * 401: 未登陆
         * 422: 表单数据错误
         */

    /**
     * 返回数组格式
     *
     * @param array $data
     * @param string $msg
     * @param int $code
     * @param array $errors
     * @return array
     */
    protected function array_response($data = [], $msg = '', $code = 0, $errors = [])
    {
        $response = [];
        if ($data) {
            if (count($data) == 1 && array_key_exists('data', $data)) {
                $response['data'] = $data['data'];
            } else {
                $response['data'] = $data;
            }
        }
        $response['code'] = $code;
        $response['msg'] = $msg?:__('message.success');
        if ($errors) {
            $response['errors']=$errors;
        }
        return response()->json($response);
    }

    /**
     * 返回无数据的消息
     * @param string $msg
     * @param int $code
     * @return array
     */
    protected function no_content ($msg = '', $code = 0) {
        return $this->array_response([], $msg, $code);
    }

    /**
     * 返回错误信息
     * @param string $msg
     * @param int $code
     * @param array $errors
     * @return array
     */
    protected function error_response($msg = '', $code = 100, $errors = []) {
        if (empty($msg)) $msg = __('message.fail');
        return $this->array_response([], $msg, $code, $errors);
    }

    /**
     * 未登录
     * @return array
     */
    protected function no_auth () {
        return $this->error_response(__('message.no login'), $code = 401);
    }

    /**
     * 未找到数据
     * @return array
     */
    protected function no_found () {
        return $this->error_response(__('message.not found'), $code = 404);
    }

    protected function send_code_sms_fail () {
        return $this->error_response(__('message.send sms code fail'), 101);
    }

    protected function send_code_sms_success () {
        return $this->array_response([], __('message.send sms code success'));
    }

    protected function send_code_sms($status)
    {
        return $status?$this->send_code_sms_success():$this->send_code_sms_fail();
    }

    /**
     * 验证码错误
     */
    protected function sms_code_error()
    {
        return $this->error_response(__('message.send sms code fail'), 102);
    }

    protected function down_response($url) {
        return response()->download($url);
    }

    /**
     * 生成一个订单号
     */
    protected function generate_order_no()
    {
        if (function_exists('dk_get_next_id')) {
            return dk_get_next_id();
        } else {
            return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        }
    }
}
