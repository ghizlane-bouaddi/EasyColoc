<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable =['title','mount','deadline','payer','colocation_id','category_id'];
public function colocation() {
    return $this->belongsTo(Colocation::class);
}

public function category() {
    return $this->belongsTo(Category::class);
}

public function payer() {
    return $this->belongsTo(User::class, 'payer_id');
}
}
