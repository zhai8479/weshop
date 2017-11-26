<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户积分变动表
 *
 * user 控制
 *
 * Class IntegralLog
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id 用户id
 * @property int $change_integral 改变的积分数量
 * @property int $type 积分变更类型  1. 消费得积分 2. 消费使用积分 3. 邀请好友得积分
 * @property int $in_out 收支类型 1. 收入, 2. 支出
 * @property int|null $admin_id 管理员id
 * @property string|null $admin_note 管理员备注
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereAdminNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereChangeIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereInOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntegralLog whereUserId($value)
 * @mixin \Eloquent
 */
class IntegralLog extends Model
{
    protected $table = 'integral_logs';

    public $timestamps = true;

    protected $fillable = [];
}
