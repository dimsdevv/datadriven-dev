# 🧠 Modul 01: Transisi Mental Model OOP (Java ➔ PHP 8+)

Selamat datang di modul pertama! Karena kamu sudah terbiasa dengan PBO Java di NetBeans pada semester 3, kamu **tidak perlu belajar logika dari nol**. Yang kamu butuhkan hanyalah **memetakan sintaks dan memahami perbedaan siklus hidupnya**.

---

## 1. Perbedaan Mendasar (Arsitektur Eksekusi)

| Aspek | Java (PBO Semester 3) | PHP 8+ (Semester 4) |
| :--- | :--- | :--- |
| **Tipe Bahasa** | Static Typing (harus deklarasi tipe data eksplisit). | Gradual / Dynamic Typing (bisa deklarasi tipe data ketat di PHP 8+ dengan `declare(strict_types=1);`). |
| **Eksekusi** | Dikompilasi ke *Bytecode* (`.class`) lalu dijalankan di JVM. | Diinterpretasikan langsung saat ada permintaan web (*request-driven*). |
| **Siklus Memori** | *Stateful* (Aplikasi jalan terus di RAM selama server/GUI hidup). | *Stateless* (Request masuk ➔ Skrip jalan ➔ Kirim HTML/JSON ➔ Memori langsung dibersihkan). |
| **Operator Objek** | Menggunakan titik (`produk.getNama()`) | Menggunakan panah (`$produk->getNama()`) |
| **Static Access** | Menggunakan titik (`Math.pow()`) | Menggunakan titik dua ganda (`Math::pow()`) |

---

## 2. Perbandingan Langsung: Java vs PHP 8+

Perhatikan betapa miripnya konsepnya, tetapi PHP modern jauh lebih ringkas berkat fitur **Constructor Property Promotion**.

### Versi Java (NetBeans Style)
```java
public class Product {
    private String id;
    private String name;
    private double costPrice;   // Harga modal (HPP)
    private double sellPrice;   // Harga jual
    private int stock;

    public Product(String id, String name, double costPrice, double sellPrice, int stock) {
        this.id = id;
        this.name = name;
        this.costPrice = costPrice;
        this.sellPrice = sellPrice;
        this.stock = stock;
    }

    public double calculateProfit() {
        return this.sellPrice - this.costPrice;
    }

    public String getName() {
        return this.name;
    }
}
```

### Versi PHP 8+ Modern
```php
<?php
declare(strict_types=1);

class Product 
{
    // PHP 8 Constructor Promotion: Deklarasi atribut & assignment langsung dalam 1 tempat!
    public function __construct(
        private string $id,
        private string $name,
        private float $costPrice,
        private float $sellPrice,
        private int $stock
    ) {}

    public function calculateProfit(): float 
    {
        return $this->sellPrice - $this->costPrice;
    }

    public function getName(): string 
    {
        return $this->name;
    }
}
```

> 💡 **Lihat bedanya?** Di PHP 8+, kamu menghemat puluhan baris kode tanpa kehilangan keamanan tipe data (*type safety*).

---

## 3. Aturan Emas di PHP Modern

1. **Gunakan tanda dollar (`$`) untuk variabel:**  
   Di Java cukup `name = "Kopi"`, di PHP wajib `$name = "Kopi"`.
2. **Jangan lupa `$this->`:**  
   Di Java, memanggil atribut di dalam kelas bisa langsung `name` atau `this.name`. Di PHP wajib eksplisit `$this->name` (tanpa tanda dollar di nama atributnya).
3. **Gunakan `declare(strict_types=1);`:**  
   Sebagai developer yang menyukai ketelitian angka bisnis dan data, selalu pasang baris ini di baris pertama file PHP-mu agar PHP menolak tipe data yang tidak sesuai (misal: memasukkan teks ke fungsi kalkulasi uang).

