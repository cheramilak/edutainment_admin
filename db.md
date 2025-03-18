#  Database Schema


## Users Table

| Column              | Type            | Constraints                      | Description                      |
|---------------------|----------------|----------------------------------|----------------------------------|
| id                 | BIGINT (AUTO_INCREMENT) | PRIMARY KEY                  | Unique user ID                  |
| name               | VARCHAR(255)    | NOT NULL                        | User's full name                |
| email              | VARCHAR(255)    | UNIQUE, NOT NULL                | User's email                    |
| email_verified_at  | TIMESTAMP       | NULLABLE                        | Email verification timestamp    |
| password           | VARCHAR(255)    | NOT NULL                        | Hashed password                 |
| type              | TINYINT         | DEFAULT 0                        | `0 = Child`, `1 = Admin`        |
| status            | BOOLEAN         | DEFAULT 1                        | `1 = Active`, `0 = Inactive`    |
| remember_token     | VARCHAR(100)    | NULLABLE                        | Token for "remember me" feature |
| created_at         | TIMESTAMP       | DEFAULT CURRENT_TIMESTAMP       | Record creation time            |
| updated_at         | TIMESTAMP       | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---


##  Quizzes Table
| Column     | Type          | Constraints                         | Description                    |
|------------|--------------|-------------------------------------|--------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique quiz ID                 |
| title      | VARCHAR(255) | NOT NULL                           | Quiz title                     |
| image      | VARCHAR(255) | NOT NULL                           | Quiz cover image               |
| slug       | VARCHAR(255) | UNIQUE, NOT NULL                   | Unique identifier for the quiz |
| status     | BOOLEAN      | DEFAULT 1                          | `1 = Active`, `0 = Inactive`   |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

##  Quiz Questions Table
| Column     | Type          | Constraints                         | Description                    |
|------------|--------------|-------------------------------------|--------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique question ID             |
| quiz_id    | BIGINT       | FOREIGN KEY (quizzes.id) ON DELETE CASCADE | Associated quiz |
| question   | TEXT         | NOT NULL                           | Quiz question text             |
| slug       | VARCHAR(255) | UNIQUE, NOT NULL                   | Unique identifier for the question |
| image      | VARCHAR(255) | NULLABLE                           | Optional image for the question |
| status     | BOOLEAN      | DEFAULT 1                          | `1 = Active`, `0 = Inactive`   |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

##  Quiz Question Options Table
| Column     | Type          | Constraints                         | Description                    |
|------------|--------------|-------------------------------------|--------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique option ID               |
| question_id| BIGINT       | FOREIGN KEY (quiz_questions.id) ON DELETE CASCADE | Associated question |
| option     | TEXT         | NOT NULL                           | Answer option text             |
| isCorrect  | BOOLEAN      | DEFAULT 0                          | `1 = Correct`, `0 = Incorrect` |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

## Quiz Leaderboards Table
| Column        | Type          | Constraints                         | Description                    |
|--------------|--------------|-------------------------------------|--------------------------------|
| id           | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique leaderboard entry       |
| user_id      | BIGINT       | FOREIGN KEY (users.id) ON DELETE CASCADE | User who took the quiz |
| quiz_id      | BIGINT       | FOREIGN KEY (quizzes.id) ON DELETE CASCADE | Associated quiz |
| correctAnswer| INT         | DEFAULT 0                          | Number of correct answers      |
| wrongAnswer  | INT         | DEFAULT 0                          | Number of wrong answers        |
| created_at   | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at   | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---


##  Stories Table
| Column      | Type          | Constraints                         | Description                    |
|------------|--------------|-------------------------------------|--------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique story ID                |
| title      | VARCHAR(255) | NOT NULL                           | Story title                    |
| image      | VARCHAR(255) | NOT NULL                           | Story cover image              |
| slug       | VARCHAR(255) | UNIQUE, NOT NULL                   | Unique identifier for the story |
| status     | BOOLEAN      | DEFAULT 1                          | `1 = Active`, `0 = Inactive`   |
| description| VARCHAR(255) | NOT NULL                           | Brief description of the story |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

##  Story Contents Table
| Column     | Type          | Constraints                         | Description                    |
|------------|--------------|-------------------------------------|--------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique content ID              |
| story_id   | BIGINT       | FOREIGN KEY (stories.id) ON DELETE CASCADE | Associated story |
| story      | TEXT         | NOT NULL                           | Story text/content             |
| image      | VARCHAR(255) | NULLABLE                           | Optional image for the content |
| order      | INT          | NOT NULL                           | Order of content in the story  |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

##  Story Questions Table
| Column    | Type          | Constraints                         | Description                    |
|----------|--------------|-------------------------------------|--------------------------------|
| id       | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique question ID             |
| story_id | BIGINT       | FOREIGN KEY (stories.id) ON DELETE CASCADE | Associated story |
| question | TEXT         | NOT NULL                           | Question text                  |
| image    | VARCHAR(255) | NULLABLE                           | Optional image for the question |
| created_at | TIMESTAMP  | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP  | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

##  Story Question Options Table
| Column      | Type          | Constraints                         | Description                    |
|------------|--------------|-------------------------------------|--------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT        | Unique option ID               |
| question_id| BIGINT       | FOREIGN KEY (story_questions.id) ON DELETE CASCADE | Associated question |
| option     | TEXT         | NOT NULL                           | Answer option text             |
| isCorrect  | BOOLEAN      | DEFAULT 0                          | `1 = Correct`, `0 = Incorrect` |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP          | Record creation time           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last update time |

---

