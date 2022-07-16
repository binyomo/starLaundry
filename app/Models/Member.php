<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Member extends Model
{
    use HasFactory;
    use Sluggable;

	protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nickname'
            ]
        ];
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
}
