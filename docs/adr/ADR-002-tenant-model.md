# ADR-002: Tenant Model Planning

## Status

Planned

## Purpose

Nova will support organization/company-level isolation through tenants.

## Planned Tenant Model

Suggested fields:

- id
- name
- slug
- domain
- status
- timezone
- currency
- locale
- logo
- settings
- created_at
- updated_at

## Future Relationships

Tenant may own:

- users
- roles
- departments
- employees
- customers
- invoices
- projects
- inventory
- settings
- policies

## Notes

Current architecture uses nullable tenant_id placeholders until tenant implementation begins.

Tenant resolution middleware/service will be added later.

## Implementation Roadmap

Planned sequence:

1. Create tenants table
2. Create Tenant model
3. Add tenant_id to users
4. Add tenant_id to tenant-owned business tables
5. Create tenant resolver service
6. Add tenant middleware
7. Add tenant global scopes where safe
8. Add tenant-aware seeders
9. Add tenant-aware settings and policies
10. Add tenant-aware frontend branding/settings

Important:

Do not add global scopes blindly until all admin/system queries are reviewed.

## Tenant Safety Checklist

Before enabling tenant isolation:

- Confirm all tenant-owned tables have tenant_id
- Confirm login resolves tenant correctly
- Confirm APIs never leak cross-tenant data
- Confirm admin/system queries intentionally bypass tenant scope only when needed
- Confirm seeders create tenant-aware records
- Confirm activity logs store tenant context
- Confirm file uploads are tenant-separated
- Confirm settings and policies resolve tenant correctly
- Confirm background jobs include tenant context
- Confirm tests cover cross-tenant access prevention
