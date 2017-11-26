<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 商品属性表
 *
 * admin 控制
 *
 * Class CommodityAbbr
 *
 * @package App\Models
 * @property int $id
 * @property int $commodity_id 商品id
 * @property int $abbr_val_id 属性值id
 * @property int $stock_id 库存id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbr whereAbbrValId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbr whereCommodityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbr whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbr whereStockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbr whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommodityAbbr extends Model
{
    protected $table = 'commodity_abbrs';

    public $timestamps = true;

    protected $fillable = [];
}
