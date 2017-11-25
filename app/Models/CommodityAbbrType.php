<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 商品属性类型表
 *
 * admin 控制
 *
 * Class CommodityAbbrType
 *
 * @package App\Models
 * @property int $id
 * @property string $name 属性名称
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityAbbrType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommodityAbbrType extends Model
{
    protected $table = 'commodity_abbr_types';

    public $timestamps = true;

    protected $fillable = [];
}
