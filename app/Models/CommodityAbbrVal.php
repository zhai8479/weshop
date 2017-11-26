<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 商品属性值表
 *
 * admin 控制
 *
 * Class CommodityAbbrVal
 *
 * @package App\Models
 * @property int $id
 * @property int $abbr_type_id 属性类型id
 * @property string $name 属性值
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrVal whereAbbrTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrVal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrVal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrVal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrVal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommodityAbbrVal extends Model
{
    protected $table = 'commodity_abbr_vals';


    public $timestamps = true;

    protected $fillable = [];
}
