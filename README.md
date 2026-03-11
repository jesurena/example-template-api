# 🛡️ Example Template API

**Example Template API** is a lightweight backend boilerplate built with **Laravel 11**. It serves as a testing playground and connection boilerplate for frontend Next.js applications, providing a basic CRUD setup without the overhead of authentication or complex multi-database architectures.

> **Note:** This API is primarily designed for **connection testing** and to serve as a starter template for development.

---

## ✨ Features

- 🛠️ **Basic CRUD**: Out-of-the-box endpoints for creating, reading, updating, and deleting items.
- 🔓 **No Auth Barrier**: Simplified configuration with no required authentication tokens to get up and running instantly.
- ⚡ **Optimized Performance**: High-efficiency Eloquent models.
- 🔗 **CORS Prepared**: Ready to accept incoming cross-origin requests from your frontend easily.

---

## 🛠️ Tech Stack

- **Framework**: [Laravel 11](https://laravel.com/) (PHP 8.2+)
- **Database**: SQLite (or your preferred relational database)
- **Tooling**: [Composer](https://getcomposer.org/), [Artisan CLI](https://laravel.com/docs/artisan)

---

## 🏁 Prerequisites

Ensure you have the following tools installed before setting up the project:
- **PHP 8.2+**
- **Composer** (v2.x)

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/jesurena/example-template-api.git
cd example-template-api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Configure Environment Variables
Copy the `.env.example` to `.env`:
```bash
cp .env.example .env
```
*(By default, this project uses an SQLite database for immediate testing without extra setup. You can change this to MySQL/Postgres in the `.env` if desired.)*

### 4. Initialize Application
```bash
php artisan key:generate
php artisan migrate
```

### 5. Launch the API
```bash
php artisan serve
```
The API serves at: **http://localhost:8000**

---

## 🔌 Connecting to the Frontend

This API is pre-made to easily hook into the `example-template` Next.js frontend. 

1. Ensure the API is running at `http://localhost:8000`.
2. In your frontend repository (`example-template`), open the `.env.local` file.
3. Set the environment variable to connect to this locally hosted API:
   ```env
   NEXT_PUBLIC_API_URL=http://localhost:8000/api
   ```
4. Update the frontend `api.ts` axios configuration if needed. (By default, this repository has removed `withCredentials: true` to prevent CORS issues since no authentication is required here).

---

## 📂 Project Structure

- `app/Modules/`: Contains self-contained feature modules (e.g., `Item`).
  - `Controllers/`: Module-specific controllers handling incoming API requests.
  - `Requests/`: FormRequest classes for validation (e.g., `StoreItemRequest.php`).
  - `Resources/`: JSON resources for standardized API responses (e.g., `ItemResource.php`).
  - `api.php`: Module-specific route definitions, automatically loaded by the main API router.
- `app/Models/`: Centralized Eloquent models (e.g., `Item.php`) defining database schema and behavior (e.g., Soft Deletes).
- `routes/api.php`: Main API router that dynamically auto-loads all module routes.

---

## 🛡️ License

Private — internal use only.