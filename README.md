# 🍕 Papa's Pizzeria

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![License](https://img.shields.io/badge/License-MIT-success?style=for-the-badge)

---

## 📖 Overview

Papa's Pizzeria is a full-stack restaurant ordering and management web application developed using PHP, MySQL, JavaScript, HTML, CSS, and Docker. The system enables customers to browse menu items, place online orders, manage their profiles, and communicate with the restaurant, while providing administrators with dedicated tools for product management, order processing, and user administration.

The project demonstrates practical software engineering principles including modular application design, database-driven development, session-based authentication, responsive web interfaces, and containerized deployment.

---

## ✨ Key Features

### Customer Module

- User registration and authentication
- Secure login and logout
- Browse menu by category
- Product search
- Shopping cart management
- Online checkout
- Order history
- Profile management
- Contact form

### Administrator Module

- Secure administrator login
- Dashboard overview
- Product management
- Customer account management
- Order management
- Message management
- Profile management

---

## 🛠️ Technology Stack

| Category | Technologies |
|-----------|--------------|
| Backend | PHP |
| Frontend | HTML5, CSS3, JavaScript |
| Database | MySQL |
| Database Access | PDO |
| Deployment | Docker, Docker Compose |
| Database Administration | phpMyAdmin |

---

## 🏗️ Project Architecture

The application follows a modular architecture that separates customer-facing functionality from administrative operations. Shared functionality such as database connectivity, headers, footers, authentication, and reusable components are organized independently to improve maintainability and reduce code duplication.

---

## 📁 Project Structure

```text
admin/            Administrative dashboard
components/       Shared PHP components
css/              Stylesheets
js/               Client-side scripts
images/           Static assets
uploaded_img/     Product images

home.php
menu.php
cart.php
checkout.php
orders.php
login.php
register.php
profile.php
contact.php
about.php

docker-compose.yml
init.sql
```

---

## 🚀 Quick Start

### Clone the repository

```bash
git clone https://github.com/vidhyaharini0/Papas-Pizzeria.git
cd Papas-Pizzeria
```

### Start Docker

```bash
docker compose up -d
```

The application will automatically initialize the MySQL database using the provided SQL script.

---

## 🗄️ Database Initialization

The project includes an SQL initialization script (`init.sql`) containing the complete database schema required to run the application. Docker automatically imports this script during the first startup.

---

## ⭐ Project Highlights

- Full-stack web application development
- Modular PHP architecture
- Session-based authentication
- CRUD operations for products, users, and orders
- MySQL database integration using PDO
- Dockerized development environment
- Responsive user interface
- Separation of customer and administrator workflows

---

## 🔮 Future Enhancements

- Password hashing using PHP's `password_hash()`
- Online payment gateway integration
- Order tracking
- Email notifications
- Inventory management
- REST API support
- Role-based authorization enhancements

---

## 🙏 Acknowledgements

Developed as part of the **Web Programming** course at the **University of Messina**.

---

## 📄 License

This project is licensed under the MIT License.
