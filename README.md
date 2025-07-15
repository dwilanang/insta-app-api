# 📸 insta-app-api

`insta-app-api` adalah RESTful API backend mirip Instagram yang dibangun menggunakan **Laravel**, **PostgreSQL**, dan berjalan dalam lingkungan **Docker**. Aplikasi ini menyediakan fitur inti seperti:

## ✨ Fitur Utama

- 🔐 **Autentikasi pengguna**
  - Register & Login (dengan token berbasis Laravel Sanctum)
- 📷 **Postingan**
  - Unggah teks & gambar
  - Lihat feed postingan pengguna
- ❤️ **Like**
  - Suka dan batal suka pada post
- 💬 **Komentar**
  - Tambah dan lihat komentar pada post
- 🔒 **Hak Akses**
  - Hanya pemilik yang bisa hapus post/komentar miliknya
- 📦 **Dockerized**
  - Mudah dijalankan menggunakan Docker + docker-compose
- 🧪 **Swagger (OpenAPI) Documentation**
  - Otomatis dihasilkan dan bisa diakses via `/docs`

## 🧰 Teknologi

- Laravel 10+
- PostgreSQL 16
- Sanctum (Token Auth)
- L5-Swagger
- Docker & Docker Compose

## 🚀 Cara Menjalankan

```bash
git clone https://github.com/dwilanang/insta-app-api.git
cd insta-app-api

# Salin .env
cp .env.example .env

# Install docker desktop
macos : https://docs.docker.com/desktop/setup/install/mac-install/
windows : https://docs.docker.com/desktop/setup/install/windows-install/

# Build & jalankan
docker-compose up --build -d


```

## 📘 Dokumentasi API

Setelah berjalan, akses dokumentasi Swagger di:
```
http://localhost:8000/api/documentation
```

## 🧪 Testing

```bash
php artisan test
```