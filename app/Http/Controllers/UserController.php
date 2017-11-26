<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:20',
            'name' => 'required|string|min:2|max:20',
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
