# ADR-001: Tenancy Strategy

## Status

Accepted for current phase.

## Decision

Nova will use a single database with tenant_id based data isolation.

## Reason

This approach is simpler for the current product phase and supports faster development.

## Current Direction

Most tenant-owned tables will include:

tenant_id

Application queries should eventually be tenant-scoped through:

- middleware
- global scopes
- tenant resolver service
- policies

## Future Flexibility

This decision can be revisited later if business needs require:

- database-per-tenant
- hybrid tenancy
- region-based data isolation

## Notes

Tenant isolation must be handled carefully to avoid data leakage between tenants.

## Tenant-Owned Tables

Most business/domain tables will eventually include:

tenant_id

Examples:

- users
- roles
- departments
- employees
- customers
- invoices
- attendance
- inventory
- projects

Some system/global tables may remain tenant-independent.

Examples:

- migrations
- jobs
- failed_jobs
- cache
- system settings

## Development Rule

New business modules should be designed with future tenant isolation in mind.

Avoid:

- hardcoding global assumptions
- querying all records without scope planning
- coupling business logic directly to authentication

Preferred approach:

- service layer abstraction
- repository/query abstraction later if needed
- tenant-aware policies/scopes
