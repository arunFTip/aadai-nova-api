# Activity Logs

---

# Package

Using:

```text
spatie/laravel-activitylog
```

---

# Logging Pattern

Automatic model logging only.

Example:

```php
use LogsActivity;
```

---

# Important Rule

Do NOT manually duplicate logs.

Avoid:

```php
activity()->log(...)
```

when automatic model logging already exists.

---

# Logged Data

- created
- updated
- deleted
- old values
- new values
- causer
- timestamps

```

```
