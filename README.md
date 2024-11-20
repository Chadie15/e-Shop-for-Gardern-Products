
# Entebbe Gardens E-Commerce Application

Welcome to the Entebbe Gardens E-Commerce Application! This application allows users to browse and purchase a variety of farm products directly from Entebbe Gardens.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- User registration and authentication
- Product catalog with categories
- Shopping cart functionality
- Secure checkout process
- Admin panel for managing products and orders
- Responsive design for mobile and desktop users

## Technologies Used

- PHP 8.2
- Laravel 11.x
- MySQL 
- HTML, CSS, JavaScript (Bootstrap for styling)
- Composer for dependency management

## Installation

To get started with the Entebbe Gardens E-Commerce Application, follow these steps:

1. **Clone the repository:**
   
bash
   git clone https://github.com/yourusername/entebbe-gardens-ecommerce.git   cd entebbe-gardens-ecommerce
   

2. **Install dependencies:**
   
bash
   composer install
   
3. **Set up the environment file:**
   - Copy the example environment file:
     
bash
     cp .env.example .env
     
   - Generate an application key:
     
bash
     php artisan key:generate
     
4. **Configure your database:**
   - Update the .env file with your database credentials:
     
plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1     DB_PORT=3306
     DBDATABASE=yourdatabase_name
     DBUSERNAME=yourusername
     DBPASSWORD=yourpassword
     

5. **Run migrations:**
   
bash
   php artisan migrate
   
6. **Seed the database (optional):**
   
bash
   php artisan db:seed
   
7. **Start the development server:**
   
bash
   php artisan serve
   
   You can now access the application at http://localhost:8000.

## Usage

Once the application is running, you can:

- Register a new account or log in if you already have one.
- Browse the available farm products by category.
- Add items to your shopping cart and proceed to checkout.


## Contributing

We welcome contributions to this project! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your branch to your forked repository.
5. Submit a pull request.

Please ensure that your code adheres to the project's coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Thank you for checking out the Entebbe Gardens E-Commerce Application! We hope you enjoy using our platform for purchasing fresh farm products.
