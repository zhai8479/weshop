<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户收货信息表
 *
 * user 控制
 *
 * Class Information
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id 用户id
 * @property string $receiving_address 收货地址
 * @property int $is_default 是否为默认地址
 * @property string $receiving_phone 收货电话
 * @property string $receiving_name 收件人姓名
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereReceivingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereReceivingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereReceivingPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Information whereUserId($value)
 * @mixin \Eloquent
 */
class Information extends Model
{
    protected $table = 'informations';

    public $timestamps = true;

    protected $fillable = [];
}
