<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 商品类型表
 *
 * admin 控制
 *
 * Class CommodityType
 *
 * @package App\Models
 * @property int $id
 * @property string $name 商品类型名称
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CommodityType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommodityType extends Model
{
    protected $table = 'commodity_types';


    public $timestamps = true;

    protected $fillable = [];
}
