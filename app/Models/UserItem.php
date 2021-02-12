<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    protected $table = 'user_items';
    protected $primaryKey = 'id';


    protected $fillable = [
        'amount',
        'user_id',
        'item_id',
        'price',
        'tax',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
