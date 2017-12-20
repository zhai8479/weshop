<?php

namespace App\Admin\Controllers;

use App\Models\CommodityAbbrType;
use App\Models\CommodityAbbrVal;

use App\Models\CommodityType;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommodityAbbrValController extends Controller
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

            $content->header('属性值表');
            $content->description('description');

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

            $content->header('属性值表');
            $content->description('description');

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

            $content->header('属性值表');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(CommodityAbbrVal::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->abbr_type_id('属性名称')->display(function ($value){
                $types = CommodityAbbrType::find($value);
                $title = $types->name;
                return $title;
            });
            $grid->value('属性值')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(CommodityAbbrVal::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('abbr_type_id','属性名称')->options(function (){
                $types = CommodityAbbrType::query()
                    ->get(['id', 'name']);
                $options = [];
                $types->reject(function ($type) use (&$options){
                    $options[$type->id] = $type->name;
                });
                return $options;
            });
            $form->text('value','属性值');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
