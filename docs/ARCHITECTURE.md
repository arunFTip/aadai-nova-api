# Architecture

---

# Backend Philosophy

Aadai Nova API follows:

- Modular architecture
- API-first design
- Enterprise ACL
- Scalable ERP conventions
- Reusable service patterns

---

# Module Structure

Each module lives inside:

```text
app/Common/
```

Example:

```text
app/Common/UserManagement/
├── Controllers/
├── Requests/
├── Actions/
├── Resources/
├── Routes/
├── Services/
├── Repositories/
├── Models/
├── Listeners/
├── Events/
```

---

# Controller Pattern

Use single-action controllers.

Example:

```php
class UserListController
{
    public function __invoke(): JsonResponse
    {
    }
}
```

---

# Validation Pattern

Always use:

```php
FormRequest
```

Never inline validation.

---

# API Response Pattern

Use:

```json
{
    "success": true,
    "message": "...",
    "data": {}
}
```

---

# ACL Architecture

Using:

```text
spatie/laravel-permission
```

Roles & permissions use:

```text
web
```

guard.

Routes use:

```php
'auth:sanctum'
```

# Seeder

RolePermissionSeeder contains:

Roles
super-admin
admin
user
Permissions
admin.view
admin.create
admin.update
admin.delete
user.view
user.create
user.update
user.delete
activity-log.view

---

# Audit Architecture

Using:

```text
spatie/laravel-activitylog
```

Automatic model logging only.

```

---
```

# Backend Conventions

Controller Pattern
Use:
\_\_invoke()
single-action controllers.

Example:

class UserListController
{
public function \_\_invoke(): JsonResponse
{
}
}

Responses
Use:
$this->successResponse()

Validation
Use FormRequest classes.

# Authentication Flow

Backend:

- Sanctum token auth
- Login endpoint
- Register endpoint
- Authenticated user endpoint

Frontend:

- Pinia auth store
- Axios token interceptor
- Route guards
- Persistent login
