<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['user_id', 'vendor_id', 'total', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendor() {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
