# 📝 Catatan Kunci & Evaluasi: Lab 01 (Transisi Java ➔ PHP & Logika Bisnis)

**Modul:** Bulan 1 - Minggu 1  
**Topik:** Transisi Mental Model OOP (Java NetBeans ke PHP 8+) & Pemodelan Data Bisnis  
**Status Eksekusi:** Sukses (`Product.php` & `index.php`)  
**Repositori GitHub:** [datadriven-dev](https://github.com/dimsdevv/datadriven-dev)

---

## 1. Pilar Software Engineering (The Builder)

### A. Constructor Property Promotion (PHP 8+)
* **Masalah di Java:** Menuliskan nama variabel berulang kali (di field kelas, parameter constructor, dan assignment `this.x = x`).
* **Solusi di PHP 8+:** Cukup tulis visibility (`private`/`public`) langsung di parameter `__construct()`. Otomatis dideklarasikan dan diisi nilainya.

### B. Strict Typing Mode
* Wajib meletakkan baris ini di paling atas file:
  ```php
  declare(strict_types=1);
  ```
* **Tujuan:** Mencegah PHP melakukan konversi tipe data otomatis (*type coercion*). Jika fungsi meminta `float`, nilai bertipe `string` akan langsung memicu error (menjaga akurasi kalkulasi uang/finansial).

### C. Operator Objek & Variabel
* Variabel lokal / properti selalu diawali tanda `$`.
* Pemanggilan method/properti objek menggunakan panah `->` (bukan titik `.` seperti di Java):
  ```php
  $product->getProfitPerUnit();
  ```

### D. Fail-Fast Validation (Integritas Data)
* Jangan biarkan objek dengan data tidak valid beredar di memori sistem. Lempar *Exception* langsung di constructor jika:
  * Harga Jual < Harga Modal (Mencegah kerugian bisnis).
  * Stok bernilai minus (Mencegah anomali pencatatan fisik).

---

## 2. Pilar Angka & Metrik Bisnis (The Analyst)

### A. Rumus Finansial Kunci
* **Gross Profit per Unit (Laba Kotor):**
  $$\text{Profit} = \text{Selling Price} - \text{Cost Price}$$
* **Gross Profit Margin (%):**
  $$\text{Margin (\%)} = \left(\frac{\text{Profit}}{\text{Selling Price}}\right) \times 100\%$$
* ⚠️ **Penting:** Margin membagi profit dengan **Harga Jual**, bukan Harga Modal. (Membagi dengan modal disebut *Markup*).

### B. Logika Operasional Restock (Safety Stock)
* Logika `isLowStock(threshold = 5)` berfungsi sebagai *Early Warning System* untuk mencegah *Stockout* (kehilangan potensi penjualan akibat kehabisan stok).

---

## 3. Pilar Arsitektur Sistem (The Architect)

* **Rich Domain Model:**
  * Kelas `Product` tidak hanya menjadi penampung data pasif (*Anemic Model*).
  * Kelas tersebut menyimpan aturan bisnis dan kemampuan kalkulasi sendiri (menghitung profit, margin, dan status stok).

---

## 4. Konfigurasi Lingkungan (Environment)

* PHP berjalan via XAMPP: `C:\xampp\php\php.exe`.
* **Rekomendasi:** Tambahkan path `C:\xampp\php` ke System Environment Variables (PATH) agar perintah `php` bisa dipanggil langsung dari terminal mana pun.

