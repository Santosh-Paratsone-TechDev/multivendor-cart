# Laravel 12 Multi‑Vendor Cart & Admin Panel

A clean, modular multi‑vendor admin panel built using **Laravel 12**, **Blade**, and **Bootstrap 5**.  
This project demonstrates a production‑ready structure for managing vendors, customers, products, and orders with a custom admin UI.
session‑based shopping cart

---

## Features

### Authentication

-   Laravel Breeze (Blade)
-   Admin‑only access to `/admin/*`

### Admin Dashboard

-   Total Orders
-   Total Customers
-   Total Vendors
-   Clean Bootstrap UI

### Orders Module

-   List all orders
-   Filters: vendor, customer, status
-   Order details page
-   Pagination with query persistence

### Products Module

-   Product list with filters
-   Create / Edit product
-   Stock management
-   Vendor assignment
-   Pagination

### UI/UX

-   Custom Bootstrap admin layout
-   Sidebar navigation
-   Top navbar with user name + logout
-   Toast alerts for create/update/delete
-   Custom admin logo

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/Santosh-Paratsone-TechDev/multivendor-cart.git
cd multivendor-cart

# package installation
composer install

# dependency installation
npm install 
npm run build   

#  Environment setup
cp .env.example .env

#update Db creds for local setup .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multi_vendor
DB_USERNAME=root
DB_PASSWORD=

# app encryption key generation
php artisan key:generate

# for migration
php artisan migrate

# for DB seed
php artisan db:seed

# OR USE .sql file to import to you mysql engin
path = sql/multi_vendor.sql

# to tun application
php artisan serve 
#http://127.0.0.1:8000

# Url http://127.0.0.1:8000/login

#custome login
Email: customer@test.com
Password: password

# admin Login # url remain same for login, but when admin logins it will redirect to http://127.0.0.1:8000/admin dashboard
Email: admin@example.com
Password: password

```