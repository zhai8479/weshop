<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 用户表
 *
 * user 控制
 *
 * App\Models\User
 *
 * @property int $id
 * @property string $user_name 用户名
 * @property string|null $email 邮箱
 * @property string|null $password 密码
 * @property int $reg_type 注册类型 1、手机号注册 2、邮箱注册 3、qq 4、微信 5、微博
 * @property string|null $mobile 手机号
 * @property int $ from_platform 平台来源 1、微信 2、qq 3、微博
 * @property string|null $reg_ip 注册ip
 * @property string|null $avatar_url 头像路径
 * @property string $invite 邀请码
 * @property int|null $invite_id 邀请人id
 * @property string|null $openid 微信提供的openId
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFromPlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereInvite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereInviteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRegIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRegType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    const REG_TYPE_MOBILE = 1;  // 手机号注册
    const REG_TYPE_EMAIL = 2;   // 邮箱注册
    const REG_TYPE_QQ = 3;      // qq
    const REG_TYPE_WECHAT = 4;  // 微信
    const REG_TYPE_WEIBO = 5;   // 微博

    public static $reg_type_list = [
        1 => '手机号',
        2 => '邮箱',
        3 => 'qq',
        4 => '微信',
        5 => '微博'
    ];

    public $timestamps = true;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }
}
