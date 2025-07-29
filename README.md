# Course Add App

A Laravel-based course management system that allows admins to dynamically add courses, modules, and video contents. Built for learning management and admin-side control.

---

##  Features

- Add courses with:
  - Title, description, category, level
  - Feature video and image
  - Pricing
- Add multiple modules per course
- Dynamically add video contents to each module
- Uses Bootstrap, jQuery, custom CSS & JS
- Modular and extendable Laravel backend

---

##  Project Structure

```bash
Course-Add-App/
├── app/
│   └── Models/               # Course, Module, Content models
│   └── Http/Controllers/     # CourseController
├── database/migrations/      # DB schema for courses/modules/contents
├── public/
│   ├── css/style.css         # Custom styles
│   └── js/script.js          # Custom scripts
├── resources/views/
│   └── courses/create.blade.php
├── routes/web.php
├── .env
└── README.md
---
##  Getting Started

Follow these instructions to set up the project on your local machine.

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL or any supported database
- Node.js and npm (for front-end assets, optional)

###  Installation

```bash
# 1. Clone the repository
git clone https://github.com/billal297222/Course-Add-App.git
cd softvence-course

# 2. Install PHP dependencies
composer install

# 3. Copy and configure your environment
cp .env.example .env
php artisan key:generate
# Edit .env and set DB credentials

# 4. Run migrations
php artisan migrate

# 5. Serve the project
php artisan serve

#Run URL
Visit: http://localhost:8000/courses/create


