<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderItem
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @mixin \Eloquent
 * @property-read \App\Order $order
 * @property-read \App\Product $product
 */
class OrderItem extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
