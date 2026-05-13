# ChatGPT Continuation Context

Aadai Nova API is a modular Laravel 12 ERP/admin backend.

---

# Current Stack

- Laravel 12
- Sanctum
- Spatie Permission
- Spatie Activity Log
- MySQL

---

# Current Completed Features

- auth
- ACL
- user CRUD
- pagination
- sorting
- search
- activity logs
- role APIs
- permission APIs

---

# Important Rules

## Permissions Guard

Use:

```text
web
```

guard.

NOT:

```text
sanctum
```

---

# Controller Style

Use:

```php
__invoke()
```

single-action controllers.

---

# Validation Style

Use:

```php
FormRequest
```

Never inline validation.

```

```
