<?php

namespace Models;

use App\Models\Invoice;
use App\Models\Line;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_AmountAttribute(): void
    {
        $invoice = Invoice::factory()->make();
        $invoice->setRelation('lines', collect([
            new Line(['product' => 'P1', 'amount' => 50.40]),
            new Line(['product' => 'P2', 'amount' => 285]),
            new Line(['product' => 'P3', 'amount' => 0])
        ]));

        $this->assertCount(3, $invoice->lines);
        $this->assertEquals(335.40, $invoice->amount);
    }
}
