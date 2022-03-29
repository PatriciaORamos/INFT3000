<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;
    public $table = 'order_info';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    public function itemsSold() {
        return $this->hasMany('\App\Models\ItemsSold','order_id', 'order_id')->orderBy('name','ASC');
    }
}
