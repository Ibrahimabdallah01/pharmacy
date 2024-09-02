<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medicines'; // Table names are typically lowercase

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'type',
        'manufacturer',
        'expiry_date',
        'price',
        'stock_quantity'
    ];
}