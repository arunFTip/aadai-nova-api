## Tenant Settings

Tenant settings store organization/company-level defaults.

Examples:

- company_name
- company_logo
- timezone
- currency
- date_format
- time_format
- number_locale
- fiscal_year_start
- enabled_modules

Suggested structure:

tenants
tenant_settings

Example schema:

tenant_id
key
value

## Tenant Policies

Tenant policies store admin-controlled restrictions and security rules.

Examples:

- allow_mobile_login
- allow_outside_office_login
- allowed_ip_ranges
- session_timeout
- require_mfa
- password_expiry_days

Suggested structure:

tenant_policies

Example schema:

tenant_id
key
value

## User Preferences

User preferences are personal overrides.

Examples:

- dark_mode
- theme_color
- table_columns
- page_size
- dashboard_layout

Suggested structure:

user_preferences

Example schema:

user_id
key
value

## Settings Access Pattern

Use SettingsService for all runtime configuration resolution.

Example:

app(SettingsService::class)
->get('format.timezone');

Future helper:

settings('format.timezone');

Do not directly query:

- tenant_settings
- tenant_policies
- user_preferences

outside the settings service layer.

## Tenant Strategy (Planned)

Current implementation uses nullable tenant_id placeholders.

Future tenancy decision pending:

Options:

1. Single database + tenant_id isolation
2. Separate database per tenant
3. Hybrid tenancy

Current architecture is being prepared to support:

- tenant-aware settings
- tenant-aware policies
- tenant-aware preferences

without coupling business logic directly to tenancy implementation.

## Policy Enforcement

Tenant policies are configuration only until enforcement middleware/services are implemented.

Planned enforcement areas:

- Login restrictions
- Mobile login restrictions
- Allowed IP validation
- Session timeout
- MFA enforcement
- Feature access restrictions

Important:

Policies should be enforced through:

- middleware
- guards
- dedicated services

not directly inside controllers.

## Setting Value Types

Settings/policies support mixed value types.

Current supported types:

- string
- boolean
- number
- json
- text

Future SettingsService should automatically cast values based on:

- type column

to avoid manual parsing throughout the application.

## Planned Middleware

Future middleware planned:

- EnsureTenantIsActive
- EnforceTenantPolicies
- EnforceAllowedIPs
- EnforceSessionTimeout
- EnforceMobileRestrictions
- ResolveTenant
- ApplyTenantSettings

Purpose:

Centralize tenant and policy enforcement outside controllers.
