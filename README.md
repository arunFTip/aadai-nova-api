# Aadai Nova API

Aadai Nova API is a modular ERP and enterprise administration backend platform built using Laravel 12.

The platform is designed to support scalable enterprise systems including:

- ERP
- CRM
- HRM
- Inventory
- Finance
- Workflow engines
- Multi-company systems

---

# Tech Stack

- Laravel 12
- Sanctum Authentication
- Spatie Permission
- Spatie Activity Log
- MySQL
- REST API Architecture

---

# Current Features

- Authentication
- Role & Permission ACL
- User Management
- Activity Logs
- Reusable API architecture
- Modular backend structure
- Enterprise ACL foundation

---

# Project Structure

```text
app/Common/
├── Authentication/
├── Authorization/
├── UserManagement/
├── ActivityLogs/

# Quick Setup

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder
php artisan serve

Documentation

See:
docs/
for full project documentation.
```

# Development Philosophy

API-first architecture
Module-first organization
Reusable UI components
Reusable backend actions/resources
Enterprise ACL patterns
Scalable ERP conventions
