<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');

        $this->middleware('jwt.api.auth')->except([]);

        $this->middleware('jwt.api.refresh');
    }

    /**
     * 创建收货地址
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'receiving_address' => 'required|string|max:255',
            'receiving_phone' => 'required|string|max:20',
            'receiving_name' => 'required|string|max:20',
            'is_default' => 'bool'
        ]);
        $user = \Auth::user();
        $create = $request->all();
        $create['user_id'] = $user->id;
        // 保证默认值只有一个
        if ($request->input('is_default')) {
            Information::where('user_id', $user->id)
                ->update(['is_default' => false]);
        }
        $information = Information::create($create);
        return $this->array_response($information);
    }

    /**
     * 删除一条收货地址信息
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $information = Information::where('user_id', \Auth::user()->id)
            ->where('id', $id)->first();
        if (empty($information)) return $this->no_found();
        $delete = $information->delete();
        return $this->array_response([
            'delete' => $delete
        ]);
    }

    /**
     * 修改收货地址
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:informations',
            'receiving_address' => 'string|max:255',
            'receiving_phone' => 'string|max:20',
            'receiving_name' => 'string|max:20',
            'is_default' => 'bool'
        ]);
        $user = \Auth::user();
        $information = Information::whereUserId($user->id)->find($request->input('id'));
        if (empty($information)) return $this->no_found();
        $update = $request->only(['receiving_address', 'receiving_phone', 'receiving_name', 'is_default']);
        if (!empty($update)) {
            foreach ($update as $key => $value) {
                $information->$key = $value;
            }
            $information->save();
        }
        return $this->array_response($information);
    }

    /**
     * 获取列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'length' => 'min:1',
        ]);
        $length = $request->input('length', 5);
        $informations = Information::whereUserId(\Auth::user()->id)->paginate($length);
        return $this->array_response($informations);
    }

    /**
     * 获取详情
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $information = Information::whereUserId(\Auth::user()->id)->find($id);
        return $this->array_response($information);
    }
}
