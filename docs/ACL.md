# ACL Architecture

---

# Package

Using:

```text
spatie/laravel-permission
```

---

# Roles

- super-admin
- admin
- user

---

# Permissions

```text
admin.view
admin.create
admin.update
admin.delete

user.view
user.create
user.update
user.delete

activity-log.view
```

---

# Important Rule

Roles & permissions MUST use:

```text
web
```

guard.

NOT:

```text
sanctum
```

---

# Middleware Example

```php
Route::middleware([
    'auth:sanctum',
    'permission:user.view',
])
```

```

```
