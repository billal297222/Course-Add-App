# Course Add App

A Laravel-based course management system that allows admins to dynamically add courses, modules, and video contents. Built for learning management and admin-side control.
---

## Features

- Create courses with title, description, and category
- Add modules dynamically with content types and values
- Frontend & backend validation to ensure clean data
- Error handling with friendly messages
- Clean UI using Bootstrap 5
- Eloquent relationships between Course → Module → Content
- Followed Laravel MVC pattern for clean structure

---

## Technologies Used

- Laravel Framework 12.16.0
- PHP 8.2.12
- Composer 2.8.4
- MySQL (or any supported DB)
- Bootstrap 5 (via CDN)
- jQuery 

---

## Getting Started (Project Setup)

> Skip this section if you already have the project running.


# Step 1: Clone the repo
git clone https://github.com/billal297222/Course-Add-App.git

cd softvence-course

# Step 2: Install dependencies
composer install

# Step 3: Copy and edit .env
cp .env.example .env
# Set DB credentials inside .env

# Step 4: Generate key & run migrations
php artisan key:generate
php artisan migrate

# Step 5: Serve the project
php artisan serve

# Run URL
Visit: http://localhost:8000/courses/create

# Screenshots
<img width="1619" height="760" alt="Screenshot 2025-07-30 004331" src="https://github.com/user-attachments/assets/67dfe3d7-f4c6-48e4-bffb-b95a50df154d" />
<img width="1575" height="517" alt="Screenshot 2025-07-30 004451" src="https://github.com/user-attachments/assets/a163e450-b041-44e8-9002-91f8cde4ccee" />
<img width="1533" height="788" alt="Screenshot 2025-07-30 004541" src="https://github.com/user-attachments/assets/3495abc3-4661-4e12-b6e3-1714cc26f4eb" />


