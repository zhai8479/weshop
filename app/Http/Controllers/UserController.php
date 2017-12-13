<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mail;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('api');

        $this->middleware('jwt.api.refresh');

        $this->middleware('jwt.api.auth')->except([
            'login', 'index', 'mobile_register', 'send_mobile_reg_code', 'email_register', 'send_email_reg_code'
            ]);
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
     * @return JsonResponse
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

    /**
     * 邮箱注册
     * @param Request $request
     * @return JsonResponse
     */
    public function email_register(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'email' => 'required|email|min:11|max:20',
            'code' => 'required|string|min:4|max:10',
            'password' => 'required|string|min:6|max:20',
            'user_name' => 'required|string|min:2|max:20',
            'from_platform' => 'integer|max:4',
            'invite_id' => 'integer|min:1|max:20|exists:users,id',
        ]);

        //  处理验证码
        $email = $request->input('email');
        $code = $request->input('code');
        if (empty($email)||empty($code)) return $this->error_response('验证码或邮箱为空');
        $cache_code = Cache::get('send_email_code_' . $email);
        \Log::info('验证码',[$email,$code,$cache_code]);
        if (empty($cache_code)) return $this->error_response('验证码不存在');
           if ($code !== $cache_code) return $this->error_response('验证码验证错误');

        // 处理数据
        $create = $request->all();
        unset($create['code']);
        $create['reg_type'] = User::REG_TYPE_EMAIL;
        $create['reg_ip'] = $request->ip();
        $create['invite'] = microtime(true) * 10000 . '_' . substr($create['email'], 1, 4);

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
     * 发送邮箱验证码
     * @param Request $request
     * @return JsonResponse
     */
    public function send_email_reg_code(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users'
        ]);
        $email = $request->input('email');
        //  生成并储存验证码
        $srand = rand(1000,9999);
        Mail::raw('您的验证码是：'.$srand,function($message)use ($email){
            $message ->to($email)->subject('测试邮件');
        });
        Cache::put('send_email_code_' . $email, $srand, 30);
        $value = Cache::get('send_email_code_' . $email);
        \Log::info('邮箱和验证码',[$email,$srand,$value]);
        return $this->array_response([], '验证码发送成功');
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


    /**
     * 获取自己的信息
     */

    public function show(Request $request)
    {
        $user = \Auth::user();
        return response()->json(
            [
            'data' => $user,
            'msg' => 'succsess',
            'code' => 0,
            ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users',
            'password' => 'string|min:6|max:20',
            'name' => 'string|min:2|max:20',
            'mobile' =>'int|digits:11'
        ]);
        $input = $request->only('email','password','name');
        if ($request->has('password')) {
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        }
        $user = $request->user();
        try {
            foreach ($input as $key => $value) {
                $user->$key = $value;
            }
            $user->save();
        } catch (\Exception $exception) {
            return $this->error_response('修改失败');
        }
        return $this->array_response(['user' => $user]);
    }

    /**
     * 获取上传的用户头像
     * @param Request $request
     * @return JsonResponse
     */
    public function avatar(Request $request)
    {
        $destinationPath = 'avatar/';
        $this->validate($request,[
            'avatar'=>'required|image|min:10|max:3072'
        ]);
        $file = $request->file('avatar');
        $file_name = \Auth::user()->id . '_' . time() . $file->getClientOriginalName();
        $file->move($destinationPath, $file_name);
        $user = User::findOrFail(\Auth::user()->id);
        $user->avatar_url = '/' . $destinationPath . $file_name;
        $user->save();
        return $this->array_response(['user' =>$user],'头像上传成功');
    }
}

