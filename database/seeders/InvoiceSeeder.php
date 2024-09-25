<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Line;
class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::factory(100)->create()->each(function ($invoice) {
            $lines = Line::factory(rand(1, 5))->make();
            $invoice->lines()->saveMany($lines);
        });
    }
}
