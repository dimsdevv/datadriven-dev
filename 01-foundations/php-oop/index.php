<?php
declare(strict_types=1);

require_once __DIR__ . '/Product.php';

use App\Foundations\Product;

echo "========================================================\n";
echo "   LAB 01: SIMULASI PRODUK & ANALISIS ANGKA BISNIS      \n";
echo "========================================================\n\n";

try {
    // 1. Membuat Object Produk (Instantiasi)
    $product1 = new Product(
        sku: "KOP-001",
        name: "Kopi Susu Gula Aren 250ml",
        costPrice: 8500.0,
        sellingPrice: 18000.0,
        stock: 4
    );

    $product2 = new Product(
        sku: "CRS-002",
        name: "Butter Croissant",
        costPrice: 12000.0,
        sellingPrice: 22000.0,
        stock: 15
    );

    $inventory = [$product1, $product2];

    // 2. Simulasi Perhitungan Bisnis
    foreach ($inventory as $item) {
        echo "Nama Produk    : " . $item->getName() . " (" . $item->getSku() . ")\n";
        echo "Harga Jual     : Rp " . number_format($item->getSellingPrice(), 0, ',', '.') . "\n";
        echo "Profit / Unit  : Rp " . number_format($item->getProfitPerUnit(), 0, ',', '.') . "\n";
        echo "Margin Profit  : " . number_format($item->getMarginPercentage(), 2) . " %\n";
        echo "Status Stok    : " . $item->getStock() . " unit ";
        
        if ($item->isLowStock()) {
            echo "⚠️ [PERINGATAN: STOK MENIPIS, SEGERA RESTOCK!]\n";
        } else {
            echo "✅ [STOK AMAN]\n";
        }
        echo "--------------------------------------------------------\n";
    }

} catch (\Exception $e) {
    echo "Terjadi Error Bisnis: " . $e->getMessage() . "\n";
}

