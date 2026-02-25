<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = ['name','status','owner_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'colocation_user')
            ->withPivot('role')
            ->withTimestamps();
    }


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function owner()
{
    return $this->belongsTo(User::class, 'owner_id');
}
}
