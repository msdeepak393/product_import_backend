<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->name = $row['product_name'];
        $product->price = $row['price'];
        $product->sku = $row['sku'];
        $product->description = $row['description'];
        $product->save();
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
}

