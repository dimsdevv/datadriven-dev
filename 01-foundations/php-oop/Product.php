<?php
declare(strict_types=1);

namespace App\Foundations;

/**
 * Class Product
 * Merepresentasikan entitas produk dengan logika bisnis dasar (margin keuntungan & stok).
 */
class Product 
{
    public function __construct(
        private string $sku,
        private string $name,
        private float $costPrice,   // Harga Pokok Penjualan (HPP / Modal)
        private float $sellingPrice, // Harga Jual ke Konsumen
        private int $stock
    ) {
        // Validasi aturan bisnis (Domain Rule)
        if ($this->sellingPrice < $this->costPrice) {
            throw new \InvalidArgumentException("Harga jual tidak boleh lebih rendah dari modal!");
        }
        if ($this->stock < 0) {
            throw new \InvalidArgumentException("Stok tidak boleh bernilai negatif!");
        }
    }

    /**
     * Menghitung laba kotor per unit (Gross Profit)
     */
    public function getProfitPerUnit(): float 
    {
        return $this->sellingPrice - $this->costPrice;
    }

    /**
     * Menghitung persentase margin keuntungan
     */
    public function getMarginPercentage(): float 
    {
        if ($this->sellingPrice == 0) {
            return 0.0;
        }
        return ($this->getProfitPerUnit() / $this->sellingPrice) * 100;
    }

    /**
     * Memeriksa apakah stok butuh restock (peringatan bisnis)
     */
    public function isLowStock(int $threshold = 5): bool 
    {
        return $this->stock <= $threshold;
    }

    // Getter methods
    public function getSku(): string { return $this->sku; }
    public function getName(): string { return $this->name; }
    public function getSellingPrice(): float { return $this->sellingPrice; }
    public function getStock(): int { return $this->stock; }
}

