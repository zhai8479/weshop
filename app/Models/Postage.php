<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 邮费设置表
 * Class Postage
 *
 * @package App\Models
 * @property int $id
 * @property int $strategy 邮费策略，1.包邮 2.满包 3.不包
 * @property float $amount 邮费金额
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Postage whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Postage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Postage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Postage whereStrategy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Postage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Postage extends Model
{
    protected $table = 'postages';

    public $timestamps = true;

    protected $fillable = [];
}
