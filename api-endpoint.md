

### 📌 API Endpoint:

```
base url  https://edutainment.bybirr.com/
Api endpoint  https://edutainment.bybirr.com/api/v1/
Asset url  https://edutainment.bybirr.com/public/storage/
```


---

### 🔧 Request

**Headers:**
```http
Authorization: Bearer {token}
Accept: application/json

```
### 📌 API Endpoint Response:

```
Code | Message | Description
200 | json | json response with data,status and message
201 | json | return json response with validation message
400 | json | return json response of error
401 | Unauthorized | Token missing/invalid
500 | Internal Server Error | Server-side error
```


### Auth Signup
This endpoint allows users to sign up for a new account.

**URL:** `/auth/signup`
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

**URL:** `/auth/login`
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

**URL:** `/auth/changePassword`
**Method:** `POST`
**Auth required:** ✅ Yes (Bearer Token)

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

**URL:** `/auth/updateProfile`
**Method:** `POST`
**Auth required:** ✅ Yes (Bearer Token)
Request Body Parameters

```
name (text): The updated name of the user.
image (file): The updated image of the user (optional).
email (text): The updated email address of the user (optional).
```

Response

```
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
image (string,nullable): URL to the user's updated image.
type (number): User type identifier.
status (number): User status identifier.


success (boolean): Indicates if the update was successful.
message (string): Additional information or error message.


// eg

{
    "data": {
        "user": {
            "id": 3,
            "name": "Test name",
            "email": "test@gmail.com",
            "email_verified_at": null,
            "created_at": "2025-04-24T20:03:37.000000Z",
            "updated_at": "2025-04-25T08:50:44.000000Z",
            "image": "profile/UP5FTFFm7IkTsDnjrYMA8mlEopPqrDqTPOvFlG4n.png",
            "type": 0,
            "status": 1
        }
    },
    "success": true,
    "message": "okay"
}

```

### Auth Logout
This endpoint is used to log out the user and invalidate the current session.
**URL:** `/auth/logout`
**Method:** `POST`
**Auth required:** ✅ Yes (Bearer Token)
Request Body:
```
No request body is required for this endpoint.
```

Response:

```
status: Indicates the status of the request. A successful logout will return a status of 200.
message: Provides a message confirming the successful logout.
```



### GET Quiz
This endpoint is used to retrieve a quiz.
**URL:** `/getQuiz`
**Method:** `GET`
**Auth required:** ✅ Yes (Bearer Token)

Request Body
```
This request does not require a request body.
```
Response
```
data (object)
quiz (array)
id (number)
title (string)
image (string)
slug (string)
status (number)
created_at (string)
updated_at (string)


success (boolean)
message (string)
```
Example Response:

```
JSON

{
    "data": {
        "quiz": [
            {
                "id": 0,
                "title": "",
                "image": "",
                "slug": "",
                "status": 0,
                "created_at": "",
                "updated_at": ""
            }
        ]
    },
    "success": true,
    "message": ""
}
```
### Quiz questions
The getQuizQuestions endpoint retrieves quiz questions based on the provided quiz slug.
**URL:** `/getQuizQuestions/slug`
**Method:** `GET`
**Auth required:** ✅ Yes (Bearer Token)

Response
The response will be a JSON object with the following schema:


JSON
```
{
    "data": {
        "quiz": {
            "id": 0,
            "title": "",
            "image": "",
            "slug": "",
            "status": 0,
            "created_at": "",
            "updated_at": ""
        },
        "questions": [
            {
                "id": 0,
                "quiz_id": 0,
                "question": "",
                "status": 0,
                "slug": "",
                "image": "",
                "created_at": "",
                "updated_at": "",
                "options": [
                    {
                        "id": 0,
                        "question_id": 0,
                        "option": "",
                        "isCorrect": 0,
                        "created_at": "",
                        "updated_at": ""
                    }
                ]
            }
        ]
    },
    "success": true,
    "message": ""
}

```
### submit quiz result

POST /setLeaderboard
This endpoint is used to set the leaderboard for a quiz.
**URL:** `/setLeaderboard`
**Method:** `POST`
**Auth required:** ✅ Yes (Bearer Token)
Request Body
```
correctAnswer (integer): The correct answer for the quiz.
wrongAnswer (integer): The wrong answer for the quiz.
quizId (integer): The ID of the quiz.
```

Response
```
The response is a JSON object with the following properties:
data (null): The data returned by the request.
success (boolean): Indicates if the request was successful.
message (string): A message related to the request.
```
JSON Schema
JSON
```
{
    "type": "object",
    "properties": {
        "data": {"type": "null"},
        "success": {"type": "boolean"},
        "message": {"type": "string"}
    }
}
```

### Get Leaderboard
This endpoint makes an HTTP GET request to retrieve the global, monthly, and today's leaderboards.
**URL:** `/getLaderbaord`
**Method:** `POST`
**Auth required:** ✅ Yes (Bearer Token)
Request Body
This request does not require a request body.

Response Body
```
data (object)
globalLeaderboard (array): Contains the global leaderboard data including user_id, name, email, image, and total_correct.
monthlyLeaderboard (array): Contains the monthly leaderboard data including user_id, name, email, image, and total_correct.
todayLeaderboard (array): Contains today's leaderboard data.

success (boolean): Indicates if the request was successful.
message (string): Provides any additional message related to the request.
```
Example Response:
```
{
    "data": {
        "globalLeaderboard": [
            {
                "user_id": 3,
                "name": "Test name",
                "email": "test@gmail.com",
                "image": "profile/UP5FTFFm7IkTsDnjrYMA8mlEopPqrDqTPOvFlG4n.png",
                "total_correct": "15"
            }
        ],
        "monthlyLeaderboard": [
            {
                "user_id": 3,
                "name": "Test name",
                "email": "test@gmail.com",
                "image": "profile/UP5FTFFm7IkTsDnjrYMA8mlEopPqrDqTPOvFlG4n.png",
                "total_correct": "15"
            }
        ],
        "todayLeaderboard": []
    },
    "success": true,
    "message": "okay"
}
```

### Get Story
This endpoint retrieves a story along with its details.
**URL:** `/getStory`
**Method:** `POST`
**Auth required:** ✅ Yes (Bearer Token)
Request
Request Body
```
This is a GET request and does not require a request body.
```
Response
```
200 OK
The response will be in JSON format with the following structure:
data (object)
story (array)
id (number): The unique identifier of the story.
title (string): The title of the story.
image (string): The URL of the story's image.
slug (string): The slug of the story.
status (number): The status of the story.
description (string): The description of the story.
created_at (string): The timestamp of when the story was created.
updated_at (string): The timestamp of when the story was last updated.
contents (array)
id (number): The unique identifier of the content.
story_id (number): The ID of the story associated with the content.
story (string): The content of the story.
image (string): The URL of the content's image.
order (number): The order of the content within the story.
created_at (string): The timestamp of when the content was created.
updated_at (string): The timestamp of when the content was last updated.


success (boolean): Indicates if the request was successful.
message (string): Any additional message related to the response.

```
Example Response:

```{
    "data": {
        "story": [
            {
                "id": 1,
                "title": "Test story",
                "image": "story/H1seIxpLbr1SQu2Momp6kTsCzRkZ052eqZO1uWJH.jpg",
                "slug": "1745514956",
                "status": 1,
                "description": "Test story",
                "created_at": "2025-04-24T17:15:56.000000Z",
                "updated_at": "2025-04-24T17:17:38.000000Z",
                "contents": [
                    {
                        "id": 1,
                        "story_id": 1,
                        "story": "story part one",
                        "image": null,
                        "order": 1,
                        "created_at": "2025-04-24T17:31:38.000000Z",
                        "updated_at": "2025-04-24T17:51:14.000000Z"
                    },
                    {
                        "id": 2,
                        "story_id": 1,
                        "story": "Story part two edit",
                        "image": "story/okZO7mv0KehdcGLHEpI6786uutr53YpiQbosuhRw.jpg",
                        "order": 2,
                        "created_at": "2025-04-24T17:34:11.000000Z",
                        "updated_at": "2025-04-24T17:51:14.000000Z"
                    }
                ]
            }
        ]
    },
    "success": true,
    "message": "okay"
}
```