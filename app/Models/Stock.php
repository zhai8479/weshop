<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 商品库存表
 *
 * admin 控制
 *
 * Class Stock
 *
 * @package App\Models
 * @property int $id
 * @property int $commodity_id 商品id
 * @property int $num_stock 库存数量
 * @property int $give_integral_num 赠送积分数量
 * @property int $usable_integral_num 可使用积分数量
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereCommodityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereGiveIntegralNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereNumStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereUsableIntegralNum($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{
    protected $table = 'stocks';

    public $timestamps = true;

    protected $fillable = [];
}
