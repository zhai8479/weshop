<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('api');

        $this->middleware('jwt.refresh');

        $this->middleware('jwt.auth')->except([
            'login', 'register', 'index', 'mobile_register', 'send_mobile_reg_code', 'email_register'
            ]);
    }

    /**
     * 注册接口
     *
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users',
            'password' => 'required|string|min:6|max:20',
            'user_name' => 'required|string|min:2|max:20',
            'reg_type' => 'required|int',
            'mobile' => 'string|min:11|max:11',
            'from_platform' => 'integer|min:2|max:20',
            'invite_id' => 'int|min:1|max:20',
            'code' => 'required|string|min:4|max:10',
        ]);
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => password_hash($request->password, PASSWORD_DEFAULT),
                'name' => $request->name,
            ]);
        } catch (\Exception $exception) {
//            return $this->error_response('注册失败','100','$exception');
            return response()->json([
                'data' => $this,
                'msg' => '注册失败',
                'code' => 100,
            ]);
        }
//        return response()->json(['code' => 0, 'msg' => '注册成功']);
        return $this->array_response('注册成功');
    }

    /**
     * 手机号注册
     * @param Request $request
     * @return array
     */
    public function mobile_register(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'mobile' => 'required|string|min:11|max:11',
            'code' => 'required|string|min:4|max:10',
            'password' => 'required|string|min:6|max:20',
            'user_name' => 'required|string|min:2|max:20',
            'from_platform' => 'integer|min:2|max:20',
            'invite_id' => 'integer|min:1|max:20|exists:users,id',
        ]);
        // todo 处理验证码

        // 处理数据
        $create = $request->all();
        unset($create['code']);
        $create['reg_type'] = User::REG_TYPE_MOBILE;
        $create['reg_ip'] = $request->ip();
        $create['invite'] = microtime(true) * 10000 . '_' . substr($create['mobile'], 7, 4);

        // 处理邀请者id
        if ($request->has('invite_id')) {
            // 进行返积分等处理
        }

        // 进行数据写入
        try {
            $user = User::create($create);
        } catch (\Exception $exception) {
            return $this->error_response('数据库错误: ' . $exception->getMessage());
        }

        // 返回处理结果
        return $this->array_response($user);
    }

    /**
     * 发送手机验证码
     * @param Request $request
     * @return array
     */
    public function send_mobile_reg_code(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|integer|max:11|unique:users'
        ]);
        $mobile = $request->input('mobile');
        // todo 生成并储存验证码

        return $this->array_response([], '验证码发送成功');
    }

    public function email_register(Request $request)
    {
        
    }

    /**
     * 登陆
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required_without:email|string|exists:users|min:11',
            'email' => 'required_without:mobile|email|exists:users',
            'password' => 'required|string|min:6|max:20',
        ]);
        if ($request->has('mobile'))
            $user = User::whereMobile($request->input('mobile'))->first();
        else
            $user = User::whereEmail($request->input('email'))->first();
        if (!password_verify($request->input('password'), $user->password)){
            return $this->error_response('密码错误');
        } else {
            $token = \JWTAuth::fromUser($user);
            return $this->array_response([], '登陆成功')->withHeaders(['authorization' => 'Bearer ' . $token]);
        }
    }
}
