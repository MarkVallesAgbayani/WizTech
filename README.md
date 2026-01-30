**WizTech Web Application**

WizTech is a simple e-commerce web application built with Laravel 12 and PHP 8.3. It allows users to browse products, add them to a cart, and manage orders. The project demonstrates CRUD operations, session-based cart functionality, and authentication.

**Features**
- User registration and login/logout
- Browse products and place orders (add to cart)
- Add, increase, reduce, and remove items from the cart
- Dashboard for authenticated users
- Session-based cart management
- Simple UI

**Requirements**
- PHP 8.3+
- Composer
- Laravel 12
- MySQL / SQLite (database supported)
- Node.js & NPM (optional, if using frontend tooling like Tailwind or Vite)

**Installation**
**Follow these steps to set up the project locally:
**
1. Clone the Repository
git clone (https://github.com/MarkVallesAgbayani/WizTech.git)
cd wiztech

2. Install PHP Dependencies
composer install

3. Configure Environment
Copy the .env.example file to .env:
cp .env.example .env


Update database settings in .env:

=> DB_CONNECTION=mysql

=> DB_HOST=127.0.0.1

=> DB_PORT=3306

=> DB_DATABASE=wiztech_db

=> DB_USERNAME=root

=> DB_PASSWORD=

4. Generate Application Key
php artisan key:generate

5. Run Migrations
php artisan migrate

6. Serve the Application
php artisan serve

The application will run at http://127.0.0.1:8000

**Routes Overview**
1. /Landing page

2. /login	User login

3. /signup	User registration

4. /dashboard	User dashboard (auth required)

5. /orders	View cart/orders

6. /cart/add/{id}	Add product to cart

7. /cart/increase/{id}	Increase product quantity

8. /cart/reduce/{id}	Reduce product quantity

9. /cart/remove/{id}	Remove product from cart

**Usage**
- Register a new account
- Browse products on the homepage
- Add products to your cart
- View and manage your cart on the orders page
- Checkout or adjust quantities as needed

**Dependencies**
- Laravel Framework 12.x
- PHP 8.3
- Tailwind CSS
- Session management for cart

**License**
This project is open-source and free to use for learning purposes.
