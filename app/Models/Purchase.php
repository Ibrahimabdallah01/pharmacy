<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'suppliers_id',
        'invoices_id',
        'voucher_number',
        'purchase_date',
        'total_amount',
        'payment_status',
    ];

    // Cast attributes to Carbon instances
    protected $casts = [
        'purchase_date' => 'date',
    ];

    // Define relationships
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }
}