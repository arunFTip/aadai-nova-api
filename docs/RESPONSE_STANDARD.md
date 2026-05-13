# Response Standard

---

# Success Response

```json
{
    "success": true,
    "message": "Success message",
    "data": {}
}
```

---

# Validation Error

```json
{
    "message": "The given data was invalid.",
    "errors": {}
}
```

---

# Pagination Response

```json
{
    "data": [],
    "pagination": {
        "current_page": 1,
        "last_page": 5,
        "per_page": 10,
        "total": 50
    }
}
```

```

```
