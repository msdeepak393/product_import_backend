# 📦 Laravel Product Import Backend

This is a Laravel-based backend API built to handle user registration, login, product import via CSV file, and product listing. It uses **Sanctum token-based authentication** and **Maatwebsite Excel** for handling file uploads.

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/msdeepak393/product_import_backend
cd product_import_backend
```

---

### 2. Install Dependencies

```bash
composer install
```

---

### 3. Configure Environment

Copy the example `.env` file and update it with your environment variables (DB, app URL, etc.):

```bash
cp .env.example .env
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Run Migrations

```bash
php artisan migrate
```

---

### 6. Enable Required PHP Extensions

Ensure the following are enabled in your `php.ini` (for `maatwebsite/excel` to work):

```
extension=gd
extension=zip
```

Restart your server (Apache/XAMPP/etc.) after updating.
