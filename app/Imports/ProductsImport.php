<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{

    public function __construct(protected int $userId)
    {
    }

    public function model(array $row)
    {
        return new Product([
            'user_id'     => $this->userId,
            'name'        => $row['product_name'],
            'price'       => $row['price'],
            'sku'         => $row['sku'],
            'description' => $row['description'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.product_name' => 'required|string',
            '*.price' => 'required|numeric',
            '*.sku' => Rule::unique('products', 'sku')->where(fn (Builder $query) => $query->where('user_id', auth()->user()->id)),
            '*.description' => 'required|string',
        ];
    }

    /**
     * Number of rows to insert at once into the database.
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * Number of rows to read at once from the Excel file.
     */
    public function chunkSize(): int
    {
        return 100;
    }
}
