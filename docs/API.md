# API Documentation

---

# Authentication

## Login

```http
POST /api/auth/login
```

### Body

```json
{
    "email": "superadmin@aadai.test",
    "password": "password123"
}
```

---

## Register User

```http
POST /api/auth/register
```

---

## Current User

```http
GET /api/auth/me
```

---

# Users

## List Users

```http
GET /api/users
```

### Query Params

```text
?page=1
&search=arun
&sort_by=name
&sort_direction=asc
&per_page=10
```

---

## Update User

```http
PUT /api/users/{id}
```

---

## Delete User

```http
DELETE /api/users/{id}
```

---

# Roles

## List Roles

```http
GET /api/roles
```

---

## Create Role

```http
POST /api/roles
```

### Body

```json
{
    "name": "manager",
    "permissions": ["user.view", "user.create"]
}
```

---

# Permissions

## List Permissions

```http
GET /api/permissions
```

---

# Activity Logs

## List Activity Logs

```http
GET /api/activity-logs
```

```

```

# Router Structure

/admin
/admin/users
/admin/users/create
/admin/users/:id/edit
/admin/activity-logs
/admin/roles
/admin/roles/create
