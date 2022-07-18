<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Barang extends Model
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
        return $this->belongsToMany(Order::class, 'barang_order')->withPivot('jumlah');
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
}
