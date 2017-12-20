<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/12/18
 * Time: 9:58
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Models\CommodityType;

class BaseController extends Controller
{
    protected function navigation_type_list ($id) {
        $list = $this->get_menu($id);
        $result =  [];
        $this->get_menu_list($list, $result);
        return $result;
    }

    protected function get_menu ($id)
    {

        $list = CommodityType::whereParentId($id)->get(['id', 'title']);
        foreach ($list as &$item) {
            $item->child = $this->get_menu($item->id);
        }
        return $list;
    }

    protected function get_menu_list($list, &$result = [], $key = -1)
    {
        $key ++ ;
        foreach ($list as $item) {
            $result[$item->id] = str_pad('', $key * 6 * 8, '&nbsp;', STR_PAD_LEFT) . $item->title;
            if (!empty($item->child)) {
                $this->get_menu_list($item->child, $result, $key);
            }
        }
    }

}