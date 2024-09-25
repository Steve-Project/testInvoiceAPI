<?php

namespace Controllers;

use App\Http\Controllers\InvoiceController;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_getInvoices(): void
    {
        Invoice::factory(30)->create();
        $firstInvoice = Invoice::factory()->create(['sent_at' => now()->subDays(2)]);
        $secondInvoice = Invoice::factory()->create(['sent_at' => now()->subDays()]);

        $invoiceController = new InvoiceController();

        $response = $invoiceController->getInvoices()->getData(true);
        $this->assertArrayHasKey('invoices', $response);
        $this->assertArrayHasKey('pagination', $response);

        $responseInvoices = $response['invoices'];
        $this->assertEquals($firstInvoice->number, $responseInvoices[0]['number']);
        $this->assertEquals($secondInvoice->number, $responseInvoices[1]['number']);

        $responsePagination = $response['pagination'];
        $this->assertEquals(32, $responsePagination['total']);
        $this->assertEquals(2, $responsePagination['last_page']);
        $this->assertEquals(20, $responsePagination['per_page']);
    }
}
