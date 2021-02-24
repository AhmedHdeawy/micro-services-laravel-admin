<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderItem[] $orderItems
 * @property-read int|null $order_items_count
 */
class Order extends Model
{
    protected $guarded = ['id'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function getTotalAttribute()
    {
        return $this->orderItems->sum(function($q) {
            return $q->price * $q->qty;
        });
    }
}
