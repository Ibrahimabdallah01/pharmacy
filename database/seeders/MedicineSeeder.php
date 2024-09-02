<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    public function run()
    {
        Medicine::create([
            'name' => 'Paracetamol',
            'description' => 'Used to treat mild to moderate pain and fever.',
            'type' => 'Tablet',
            'manufacturer' => 'XYZ Pharmaceuticals',
            'expiry_date' => '2025-08-30',
            'price' => 2.50,
            'stock_quantity' => 100,
        ]);

        Medicine::create([
            'name' => 'Cough Syrup',
            'description' => 'Used to relieve cough.',
            'type' => 'Syrup',
            'manufacturer' => 'ABC Pharmaceuticals',
            'expiry_date' => '2024-12-15',
            'price' => 5.00,
            'stock_quantity' => 50,
        ]);

        // Add more medicines as needed
    }
}