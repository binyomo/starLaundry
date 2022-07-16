<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['ambil'];

    public function getRouteKeyName(){
        return 'code';
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function barang(){
        return $this->belongsToMany(Barang::class, 'barang_order');
    }

    public function discount(){
    	return $this->belongsTo(Discount::class);
    }

    public function outlet(){
    	return $this->belongsTo(Outlet::class);
    }
}
