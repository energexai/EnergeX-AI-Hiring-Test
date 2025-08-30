# EnergeX-AI-Hiring-Test
Screening test for software engineer applicants (debugging + QA)
# Full-Stack Developer Technical Assessment

**Objective**  
Build a microservice API using **Lumen (PHP)** and **Node.js (TypeScript)** that integrates with **Redis** for caching, a **MySQL** database, and a simple frontend (**React.js** or **Vue.js**) to consume the API.

---

## Assessment Breakdown

| Section                | Task                                                                | Points |
|------------------------|---------------------------------------------------------------------|:-----:|
| Backend (Lumen)        | Build a RESTful API using Lumen with JWT authentication             |  20   |
| Backend (Node.js)      | Create a caching layer with Redis for fast API responses            |  20   |
| Database (MySQL)       | Store and retrieve user and post data in MySQL                      |  15   |
| Frontend (React/Vue)   | Create a simple UI that consumes the API                            |  10   |
| Testing                | Write unit tests for API endpoints (PHPUnit/Jest)                   |  15   |
| DevOps (Docker)        | Containerize the application using Docker                           |  10   |
| CI/CD                  | Set up GitHub Actions/GitLab CI to automate testing                 |  10   |

---

## Test Instructions

### 1) Backend (Lumen – PHP)
**Task:** Create a REST API for user authentication and posts

- Install **Lumen** and set up the project.
- Use **JWT authentication** for secure login and API access.
- Create the following endpoints:

**Endpoints (Lumen API)**

| Method | Endpoint         | Description                                 |
|-------:|------------------|---------------------------------------------|
| POST   | `/api/register`  | Register a new user (name, email, password) |
| POST   | `/api/login`     | Authenticate user and return JWT token      |
| GET    | `/api/posts`     | Fetch all posts (**cached in Redis**)       |
| POST   | `/api/posts`     | Create a new post (title, content, user_id) |
| GET    | `/api/posts/{id}`| Fetch a single post (**cached in Redis**)   |

> Implement **Redis caching** for `/api/posts` and `/api/posts/{id}` to reduce database queries.

---

### 2) Backend (Node.js – TypeScript)
**Task:** Implement Redis Caching for Performance

Create a Node.js service that:
- Acts as a **cache layer** using Redis.
- Listens for API requests and serves cached posts **before** querying MySQL.
- Uses **Express.js** and a Redis client.

**Endpoints (Node.js Cache API)**

| Method | Endpoint             | Description                              |
|-------:|----------------------|------------------------------------------|
| GET    | `/cache/posts`       | Fetch cached posts from Redis            |
| GET    | `/cache/posts/{id}`  | Fetch single post (Redis first, then DB) |

> If a post is not cached, fetch it from MySQL and store it in Redis.

---

### 3) Database (MySQL)
**Task:** Store User and Post Data

- Create a MySQL database with two tables:

`users (id, name, email, password)`  
`posts (id, title, content, user_id, created_at)`

- Use **migrations** to set up schema.
- Hash passwords (e.g., **bcrypt**).

---

### 4) Frontend (React.js or Vue.js)
**Task:** Create a Simple UI to Consume the API

Build a minimal frontend that:
- Allows **user registration and login**.
- Displays a list of posts from `/api/posts`.
- Includes a form to **add a new post**.
- Uses **Axios** or **Fetch API** to call backend endpoints.

---

### 5) Unit Testing
**Task:** Write Unit Tests
- **Lumen:** PHPUnit for API routes and auth.
- **Node.js:** Jest (+ Supertest) for API responses.

---

### 6) DevOps (Docker)
**Task:** Containerize the App
- Create a **Dockerfile** for Lumen, Node.js, and MySQL.
- Use **Docker Compose** to orchestrate services.
- Ensure PHP, Node, **Redis**, and **MySQL** run in containers.

---

### 7) CI/CD Pipeline
**Task:** Automate Testing & Deployment
- Set up **GitHub Actions** or **GitLab CI/CD** to:
  - Run unit tests on push.
  - Build and (optionally) deploy the application.

---

## Evaluation Criteria

| Criteria              | Description                                      |
|-----------------------|--------------------------------------------------|
| Code Quality          | Clean, modular, well-documented code             |
| API Performance       | Effective use of Redis caching                   |
| Security              | Correct JWT implementation and password hashing  |
| Testing               | Useful, passing unit tests for endpoints         |
| Docker Implementation | Correctly containerized services                 |
| CI/CD Pipeline        | Automated tests run successfully                 |
| Frontend UI           | Simple, functional, and consumes API correctly   |

---

## Bonus (Optional)
- ✅ Role-Based Access Control (RBAC)  
- ✅ Use **GraphQL** instead of REST  
- ✅ Add **WebSockets (Socket.io)** for live post updates  
- ✅ Optimize Redis with expiries/eviction policies

---

## Submission Instructions
1. Push code to **GitHub/GitLab** (share access if private).  
2. Include a **README** explaining setup and functionality.  
3. Provide **API documentation** (Swagger/Postman collection).  

**Expected Time:** ⏳ **4–6 hours** (depending on experience).
