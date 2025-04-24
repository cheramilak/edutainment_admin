

### 📌 Endpoint: Get Today's Leaderboard

**URL:** `/api/leaderboard/today`
**Method:** `GET`
**Auth required:** ✅ Yes (Bearer Token)

---

### 🔧 Request

**Headers:**
```http
Authorization: Bearer {token}
Accept: application/json

```
```
Code | Message | Description
401 | Unauthorized | Token missing/invalid
500 | Internal Server Error | Server-side error