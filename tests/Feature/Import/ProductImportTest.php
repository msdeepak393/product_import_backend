<?php

namespace Tests\Feature\Import;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProductImportTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_upload_product_csv()
    {
        Storage::fake('local');

        $user = User::factory()->create();

        $file = new UploadedFile(
            base_path('sample_product/Products.csv'),
            'Products.csv',
            'text/csv',
            null,
            true
        );

        $response = $this->actingAs($user)->postJson('/api/import-product', [
            'file' => $file,
        ]);

        $response->assertOk();
    }
}
