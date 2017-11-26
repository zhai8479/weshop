<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户积分表
 *
 * user 控制
 *
 * Class Integral
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id 邀请人id
 * @property int $integral 积分总数量
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Integral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Integral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Integral whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Integral whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Integral whereUserId($value)
 * @mixin \Eloquent
 */
class Integral extends Model
{
    protected $table = 'integrals';

    public $timestamps = true;

    protected $fillable = [];
}
