<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 商品表
 *
 * admin 控制
 *
 * Class Commodity
 *
 * @package App\Models
 * @property int $id
 * @property string $commodity_name 商品标题
 * @property int $type_id 商品类型id
 * @property string $particulars 商品详情url数组
 * @property int $is_top 是否设置为推荐
 * @property string $list_img 列表显示图片
 * @property string|null $carousel_img 轮播显示图片
 * @property float|null $price_tag 标价
 * @property float $present_price 现价
 * @property int $postage_id 邮费规则id
 * @property int $weight 权重
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCarouselImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCommodityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereListImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereParticulars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity wherePostageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity wherePresentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity wherePriceTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereWeight($value)
 * @mixin \Eloquent
 */
class Commodity extends Model
{
    protected $table = 'commodities';

    public $timestamps = true;

    protected $fillable = [];
}
