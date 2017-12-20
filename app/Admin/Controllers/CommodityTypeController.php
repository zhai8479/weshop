<?php

namespace App\Admin\Controllers;

use App\Models\CommodityType;
use Encore\Admin\Form;
use Encore\Admin\Tree;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommodityTypeController extends BaseController
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('商品类型列表');
            $content->description('列表');
            $content->body(CommodityType::tree());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('商品类型表');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    public function destroy($id)
    {
        if ($id <= 9) {
            return response()->json([
                'status'  => false,
                'message' => trans('admin.delete_failed_by_default'),
            ]);
        } else {
            if ($this->form()->destroy($id)) {
                return response()->json([
                    'status'  => true,
                    'message' => trans('admin.delete_succeeded'),
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => trans('admin.delete_failed'),
                ]);
            }
        }
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('商品类型表');
            $content->description('创建');

            $content->body($this->form());
        });
    }



    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(CommodityType::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title','类型名称');
            $options = $this->navigation_type_list(0);
            $options[0] = '根目录';
            $form->select('parent_id','所属栏目')->options($options);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
