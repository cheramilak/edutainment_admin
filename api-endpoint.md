

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
```


### Auth Signup
This endpoint allows users to sign up for a new account.

**URL:** `/api/leaderboard/today`
**Method:** `POST`
```
Request Body
form-data
name (text)
email (text)
password (text)
image (image) (optional)
```


Response


```

JSON

{
  "type": "object",
  "properties": {
    "data": {
      "type": "object",
      "properties": {
        "user": {
          "type": "object",
          "properties": {
            "name": {"type": "string"},
            "email": {"type": "string"},
            "type": {"type": "integer"},
            "image": {"type": "string"},
            "status": {"type": "integer"},
            "updated_at": {"type": "string"},
            "created_at": {"type": "string"},
            "id": {"type": "integer"}
          }
        },
        "token": {"type": "string"}
      }
    },
    "success": {"type": "boolean"},
    "message": {"type": "string"}
  }
}

// Example response

{
    "data": {
        "user": {
            "name": "Test user",
            "email": "test1@gmail.com",
            "type": 0,
            "image": null,
            "status": 1,
            "updated_at": "2025-04-24T20:04:16.000000Z",
            "created_at": "2025-04-24T20:04:16.000000Z",
            "id": 4
        },
        "token": "2|K0TnamfaY3LewHE9kKcoMaUSf7dge3nCh8veuCKK72cc08bc"
    },
    "success": true,
    "message": "Success"
}

```

### Auth Login
This endpoint allows users to log in and obtain an authentication token.

**URL:** `/api/leaderboard/today`
**Method:** `POST`
```
Request Body
email (text)
password (text)

```
Response

JSON
```
{
  "type": "object",
  "properties": {
    "data": {
      "type": "object",
      "properties": {
        "user": {
          "type": "object",
          "properties": {
            "id": {
              "type": "integer"
            },
            "name": {
              "type": "string"
            },
            "email": {
              "type": "string"
            },
            "email_verified_at": {
              "type": "string"
            },
            "created_at": {
              "type": "string"
            },
            "updated_at": {
              "type": "string"
            },
            "image": {
              "type": ["string", "null"]
            },
            "type": {
              "type": "integer"
            },
            "status": {
              "type": "integer"
            }
          }
        },
        "token": {
          "type": "string"
        }
      }
    },
    "success": {
      "type": "boolean"
    },
    "message": {
      "type": "string"
    }
  }
}

// eg

{
    "data": {
        "user": {
            "id": 3,
            "name": "Test user",
            "email": "test@gmail.com",
            "email_verified_at": null,
            "created_at": "2025-04-24T20:03:37.000000Z",
            "updated_at": "2025-04-24T20:03:37.000000Z",
            "image": null,
            "type": 0,
            "status": 1
        },
        "token": "3|YMhddZcaL5HS7eNUFexeTAPjQv2MRngleT3iADHa390580a0"
    },
    "success": true,
    "message": "Success"
}

```

### Change Password
This endpoint is used to change the user's password.

Request Body Parameters
```
oldPassword (text): The user's current password.
newPassword (text): The new password that the user wants to set.
```
Response

The response is in JSON format and has the following schema:

JSON
```
{
    "data": null,
    "success": true,
    "message": ""
}

data: (null) This field is null as there is no specific data returned.
success: (boolean) Indicates whether the password change was successful.
message: (string) A message indicating the result of the password change operation.

// eg

{
    "data": null,
    "success": true,
    "message": "Success"
}

```
### Update Profile
This endpoint allows the user to update their profile information.

Request Body Parameters

```
name (text): The updated name of the user.
image (file): The updated image of the user (optional).
email (text): The updated email address of the user (optional).
```

Response
Status: 200
Content-Type: application/json
data (object)
user (object)
id (number): The user's unique ID.
name (string): The user's updated name.
email (string): The user's updated email address.
email_verified_at (string): Timestamp for email verification.
created_at (string): Timestamp for user creation.
updated_at (string): Timestamp for last update.
image (string): URL to the user's updated image.
type (number): User type identifier.
status (number): User status identifier.


success (boolean): Indicates if the update was successful.
message (string): Additional information or error message.








