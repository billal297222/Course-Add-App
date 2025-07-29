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


