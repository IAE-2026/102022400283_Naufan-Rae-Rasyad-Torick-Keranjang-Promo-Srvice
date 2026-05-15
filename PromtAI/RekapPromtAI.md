# Rekap Log Prompting dengan AI

## Tanggal: 16 Mei 2026

### 02:13 WIB
Melakukan pengecekan endpoint API menggunakan Laravel dan Postman.  
Ditemukan error:
- `Class "App\\Http\\Controllers\\Controller" not found`

Tindakan:
- Memperbaiki namespace dan struktur file `Controller.php`.

---

### 02:20 WIB
Endpoint `/api/v1/promo/apply` berhasil dijalankan melalui Postman.  
Response:
```json
{
  "status": "success",
  "message": "PROMO WORK"
}
```

---

### 02:23 WIB
Melakukan pengembangan fitur perhitungan promo otomatis berdasarkan:
- kode promo
- total transaksi

Tindakan:
- Menambahkan logika diskon pada `PromoController.php`.

---

### 02:29 WIB
Pengujian ulang endpoint promo berhasil.  
Response:
```json
{
  "status": "success",
  "promo_code": "DISKON10",
  "discount": 10000,
  "final_total": 90000
}
```

---

### 02:32 WIB
Membuat migration dan model untuk tabel promo menggunakan Laravel Artisan.

Command:
```bash
php artisan make:migration create_promos_table
php artisan make:model Promo
```

---

### 02:45 WIB
Melakukan validasi endpoint berdasarkan ketentuan tugas Service C:
- GET `/api/v1/products`
- POST `/api/v1/carts`
- DELETE `/api/v1/carts/{id}`
- GET `/api/v1/carts/{id}`
- POST `/api/v1/promo/apply`
- GET `/api/v1/promo`
- GET `/api/v1/promo/{id}`

Hasil:
- Endpoint berhasil dibuat dan diuji menggunakan Postman.

---

### 02:50 WIB
Memulai konfigurasi Swagger Documentation menggunakan package `L5 Swagger`.

Command:
```bash
php artisan l5-swagger:generate
```

Kendala:
- Error `Required @OA\Info() not found`

---

### 03:00 WIB
Melakukan debugging konfigurasi Swagger:
- Menambahkan annotation `@OA\Info`
- Membuat file dokumentasi OpenAPI
- Membersihkan cache Laravel

Command:
```bash
php artisan optimize:clear
composer dump-autoload
```

---

### 03:27 WIB
Swagger UI berhasil terbuka pada:
```text
http://127.0.0.1:8000/api/documentation
```

Namun ditemukan kendala:
- `Failed to load API definition`

---

### 03:40 WIB
Melakukan perbaikan dependency Swagger dan penyesuaian annotation agar kompatibel dengan versi package yang digunakan.

---

### 04:00 WIB
Melakukan final checking pada:
- Endpoint API
- Response JSON
- Routing Laravel
- Dokumentasi Swagger

Status:
- Sebagian besar fitur utama telah berjalan dengan baik.
- Swagger masih dalam tahap penyesuaian konfigurasi.

