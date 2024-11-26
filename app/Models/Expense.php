<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'amount','date_time','user_id','category_id'
    // ];

    protected $casts =[
        'date_time' => 'datetime'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
