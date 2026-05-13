````md
# Backend Setup

---

# Requirements

- PHP 8.3+
- Composer
- MySQL

---

# Installation

```bash
composer install
```
````

---

# Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

---

# Database Setup

```bash
php artisan migrate
```

---

# Seeders

```bash
php artisan db:seed --class=RolePermissionSeeder
```

---

# Run Server

```bash
php artisan serve
```

---

# Important Commands

## Clear Cache

```bash
php artisan optimize:clear
```

## Reset Permission Cache

```bash
php artisan permission:cache-reset
```

## Composer Autoload

```bash
composer dump-autoload -o
```

```

```

# Important Commands

Clear Laravel Cache:
php artisan optimize:clear

Reset Permission Cache:
php artisan permission:cache-reset

Composer Autoload:
composer dump-autoload -o

Route Check:
php artisan route:list
