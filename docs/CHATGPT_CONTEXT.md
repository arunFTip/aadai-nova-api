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

## Frontend Settings Architecture

Frontend preferences are loaded through:

src/stores/preferenceStore.js

Formatting helpers use:

- getPreference()
- fallback defaults

Localization-aware helpers:

- formatDate
- formatTime
- formatDateTime
- formatCurrency
- formatNumber

Goal:

Future settings resolution should support:

User Preferences
↓
Tenant Policies
↓
Tenant Settings
↓
System Defaults

## Planned Settings Features

Upcoming settings areas:

- Tenant branding
- Theme customization
- Notification preferences
- Dashboard personalization
- Language preferences
- Feature toggles
- Tenant-aware menus
- Runtime settings resolver
- Tenant policy enforcement UI
- Module enable/disable management
