<?php

namespace App\Admin\Controllers;

use App\Models\Commodity;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;
use Encore\Admin\Form;

class CommodityController extends Controller
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

            $content->header('商品表');
            $content->description('列表');

            $content->body($this->grid());
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

            $content->header('商品');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }
    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('商品');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return \Encore\Admin\Grid
     */
    protected function grid()
    {
        return Admin::grid(Commodity::class, function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return \Encore\Admin\Form
     */
    protected function form()
    {
        return Admin::form(Commodity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('commodity_name','商品标题');
            $form->select('type_id','商品类型');
            $form->editor('particulars','商品详情');
            $form->image('list_img','列表图片');
            $form->image('carousel_img','轮播图片');
            $form->select('postage_id','邮费规则');
            $form->number('weight','权重');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
