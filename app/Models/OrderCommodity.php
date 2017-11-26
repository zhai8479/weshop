<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 订单商品信息表
 * 
 * user 控制
 *
 * Class OrderCommodity
 *
 * @package App\Models
 * @property int $id
 * @property int $order_id 订单id
 * @property int $commodity_id 商品id
 * @property int $stock_id 库存id
 * @property int $commodity_num 商品数量
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderCommodity whereCommodityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderCommodity whereCommodityNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderCommodity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderCommodity whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderCommodity whereStockId($value)
 * @mixin \Eloquent
 */
class OrderCommodity extends Model
{
    protected $table = 'order_commodities';

    public $timestamps = true;

    protected $fillable = [];
}
