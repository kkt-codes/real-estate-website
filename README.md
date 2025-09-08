# MKO Real Estate Website

Welcome to the MKO Real Estate website project! This is a dynamic, database-driven web application built with PHP, MySQL, HTML, CSS, and JavaScript. It serves as a comprehensive platform for browsing, managing, and interacting with property listings, catering to both property seekers and real estate agents.

## Key Features

* **Dual User Roles**: The platform supports two distinct user types:
    * **Customers**: Can browse listings, bookmark their favorite properties, and schedule appointments.
    * **Agents**: Can manage their own property listings, view appointments, and track their sales and rental transactions.
* **Dynamic Property Listings**: A comprehensive system for displaying properties with detailed information, including image galleries, descriptions, and key features.
* **Interactive User Dashboards**: Separate, tailored dashboards for both customers and agents to manage their activities efficiently.
* **Secure Authentication**: A robust login and registration system for both user types, with session management to protect user data.
* **Appointment Scheduling**: A seamless system for customers to schedule property viewings with agents directly from a property's detail page.
* **Transaction Logging**: Agents can log their sales and rentals, which are then reflected on their dashboard, providing a clear history of their success.

## Getting Started

To get this project up and running on your local machine, you'll need to set up a local server environment (like XAMPP) and configure the database.

### Prerequisites

* A local server environment (XAMPP, WAMP, or MAMP is recommended).
* A MySQL database (usually included with the server environments above).
* A web browser.

### Installation & Setup

1.  **Place Project in Server Directory**:
    * Move the entire `real-estate-website` folder into the `htdocs` directory if you are using XAMPP, or the `www` directory for WAMP/MAMP.
2.  **Set Up the Database**:
    * Open your MySQL database management tool (e.g., phpMyAdmin, which comes with XAMPP).
    * Create a new, empty database named `real_estate_db`.
    * Select the new `real_estate_db` database.
    * Go to the "Import" tab and upload the `database/schema.sql` file. This will create all the necessary tables.
    * (Optional) To populate the website with sample properties and users, run the `database/seed.php` script by navigating to `http://localhost/real-estate-website/database/seed.php` in your browser.
3.  **Database Connection**:
    * Open the `backend/db_connection.php` file.
    * By default, it's configured for a standard XAMPP setup (`root` username and no password). If your database credentials are different, update them in this file.

## How to Run the Application

1.  **Start Your Local Server**: Launch your XAMPP/WAMP/MAMP control panel and make sure both the **Apache** and **MySQL** services are running.
2.  **Open in Your Browser**: Navigate to the following URL in your web browser:
    ```
    http://localhost/real-estate-website/pages/homePage.php
    ```
    You should now see the MKO Real Estate homepage!

![This is the home page](./README_MEDIA/Home Page.png)