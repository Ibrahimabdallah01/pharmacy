<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineStock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'medicine_id',
        'batch_id',
        'expiry_date',
        'quantity',
        'mrp',
        'rate'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}