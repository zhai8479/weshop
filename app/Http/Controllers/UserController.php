<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users',
            'password' => 'required|string|min:6|max:20',
            'name' => 'required|string|min:2|max:20',
            'reg_type' => 'required|int',
            'mobile' => 'int|min:11|max:11',
            'from_platform' => 'int|min:2|max:20',
            'reg_ip' => 'string|min:8|max:40',
            'avatar_url' => 'string|min:2|max:20',
            'invite' => 'required|string|min:8|max:40',
            'invite_id' => 'int|min:1|max:20',
            'openid' => 'string|min:2|max:100',
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

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|max:20',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!password_verify($request->password, $user->password))
            return $this->error_response('密码错误');
        else {
            $token = \JWTAuth::fromUser($user);
            return $this->array_response('登陆成功')->withHeaders(['authorization' => 'Bearer ' . $token]);
        }
    }
}
