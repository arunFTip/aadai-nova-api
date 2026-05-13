# Database Standards

---

# Naming

- snake_case tables
- snake_case columns
- singular model names

---

# Primary Keys

Use:

```text
id
```

---

# Foreign Keys

Use:

```text
user_id
role_id
company_id
```

---

# Timestamps

Use Laravel timestamps.

---

# Soft Deletes

Use soft deletes where business history matters.

---

# Audit Logging

Critical models should use activity logs.

```

```

# DataTable Architecture

Current features:

- pagination
- server-side search
- sorting
- page size
- debounce search

Future:

- filters
- export
- advanced query builder
