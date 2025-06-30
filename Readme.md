# DesaKu

**DesaKu** is a Laravel-based web application designed to support administrative and public service functions for villages. It includes features such as resident management, user roles, and complaint handling.

---

## 🚀 Features

- User authentication and role-based access control
- Resident data management
- Complaint submission and tracking
- RESTful API structure
- Admin and user-level dashboards
- Middleware for role authorization

## 🛠 Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** Blade templating engine + Vite
- **Database:** MySQL
- **Package Manager:** Composer, NPM
- **Other:** TailwindCSS, Laravel Vite, Laravel Sanctum

## 📦 Installation

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL
- Laravel CLI

### Setup Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/your-username/DesaKu.git
   cd DesaKu
    ```

2. Install Dependencies
    ```
    composer install
    npm install && npm run dev
    ```

3. Set Up Environment

    ```
    cp .env.example .env
    php artisan key:generate
    Then configure .env with your database credentials.

    ```

4. Run Migrations and Seeders
    ```
    php artisan migrate --seed
    ```

5. Serve the Application
    ```
    php artisan serve
    ```
6. Access the app at http://localhost:8000
---
### 👥 User Roles
- Admin: Full access, including user and complaint management

- Resident: Can view and submit complaints

## 📂 Project Structure
- app/Http/Controllers/ — Application logic (e.g. ComplaintController.php)

- app/Models/ — Eloquent models (e.g. Resident.php, Complaint.php)

- routes/web.php — Web routes

- resources/views/ — Blade templates

- public/ — Public assets

### ✅ Testing
```
php artisan test
```

---

## Author

Created by [M Elham Abdussalam](https://www.linkedin.com/in/m-elham-abdussalam?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BCjehyApZQbCrHpBTPjJSOA%3D%3D). Feel free to contact for collaboration or improvements!