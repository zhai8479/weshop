<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 订单表
 *
 * user 控制
 *
 * Class Order
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id 用户id
 * @property string $order_num 订单单号
 * @property int $order_status 订单状态 1. 待支付 2. 待发货 3. 已发货 4. 已签收 5. 未支付取消 6. 已支付取消 7. 超时取消 8. 管理员取消
 * @property int $payment_status 支付状态 1. 待支付 2. 已支付 3. 已取消
 * @property string $payment_order 外部支付单号
 * @property string $user_note 用户订单备注
 * @property string $admin_note 管理员备注
 * @property float $commodity_price 商品价格
 * @property float $postage_price 邮费
 * @property float $real_pay_price 实际支付金额
 * @property float $integral_price 积分抵扣金额
 * @property int $integral_num 使用积分数量
 * @property string $receiving_address 收货地址
 * @property string $receiving_phone 收货电话
 * @property string $receiving_name 收件人姓名
 * @property int $shipment_number 物流单号
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAdminNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCommodityPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIntegralNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIntegralPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePostagePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereRealPayPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereReceivingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereReceivingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereReceivingPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShipmentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserNote($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = true;

    protected $fillable = [];
}
