# Tenancy and Settings Architecture

## Settings Layers

Nova uses layered configuration:

1. System Defaults
2. Tenant Settings
3. Tenant Policies
4. User Preferences

Resolution order:

User Preferences → Tenant Settings/Policies → System Defaults

## Tenant Settings

Tenant settings are company-level defaults.

Examples:

- company name
- company logo
- timezone
- currency
- date format
- time format
- number locale
- fiscal year
- enabled modules

## Tenant Policies

Tenant policies are admin-controlled rules.

Examples:

- allow mobile login
- allow outside-office login
- allowed IP ranges
- password policy
- session timeout
- MFA requirement
- locked UI settings

Security policies must not be controlled by normal users.

## User Preferences

User preferences are personal UI/config overrides.

Examples:

- dark mode
- theme color
- table column visibility
- page size
- notification preferences
- preferred date/time display where allowed

## Configuration Resolution

When Nova needs a setting:

1. Check user preference
2. If missing or locked, check tenant setting/policy
3. If missing, use system default

## Important Rule

Security-sensitive settings belong to tenant policies, not user preferences.
