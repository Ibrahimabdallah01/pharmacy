<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specify the table if different from the default
    protected $table = 'customers';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'contact',
        'address',
        'doctor_name',
        'doctor_address',
    ];
}