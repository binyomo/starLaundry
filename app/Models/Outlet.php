<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Outlet extends Model
{
    use HasFactory;
    use Sluggable;

	protected $guarded = ['id'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class);
    }

    public function members(){
        return $this->hasMany(Member::class);
    }

    public function barangs(){
        return $this->hasMany(Barang::class);
    }
}
