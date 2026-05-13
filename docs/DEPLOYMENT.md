# Deployment

---

# Production Requirements

- PHP 8.3+
- MySQL
- Nginx or Apache
- Supervisor
- Redis (future)

---

# Install

```bash
composer install --optimize-autoloader --no-dev
```

---

# Environment

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

# Queue Workers

Use Supervisor for queues.

---

# Storage

```bash
php artisan storage:link
```

---

# Important Production Commands

```bash
php artisan optimize
php artisan migrate --force
```

```

```
