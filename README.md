# Automobile Project

A Laravel-based eCommerce platform for selling automobile parts. This project provides a robust solution for managing an online automobile parts store, including product catalog management, secure checkout, order tracking, user authentication, and an admin dashboard for inventory control. The platform supports multiple payment gateways and features a responsive design for a seamless user experience.

## Features
- Product catalog management
- Secure checkout and order processing
- Order tracking for customers
- User authentication and registration
- Admin dashboard for inventory and order management
- Multiple payment gateway support
- Responsive design for mobile and desktop

## Requirements
- PHP 7.4 or higher
- Composer
- MySQL or compatible database
- Node.js & npm (for frontend assets)
- Laravel 8.x or higher

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/jhaNityanand/automobile-project.git
   cd automobile-project
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Copy the example environment file and set your configuration:**
   ```bash
   cp .env.example .env
   # Edit .env to match your database and mail settings
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

6. **(Optional) Seed the database:**
   ```bash
   php artisan db:seed
   ```

7. **Install frontend dependencies and build assets:**
   ```bash
   npm install && npm run dev
   ```

8. **Start the development server:**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser to access the application.

## Usage
- Register as a user or log in as an admin to manage products and orders.
- Browse the catalog, add items to cart, and proceed to checkout.
- Admins can access the dashboard for inventory and order management.

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
