# Index Manager

Index Manager is a web-based talent acquisition system for HR management. It provides a simple and efficient way to manage a database of job applicants.

## Features

*   **Add New Applicants:** Easily add new applicants to the system with a comprehensive form that includes personal details, contact information, government ID numbers, a photo, and a PDF document.
*   **View Applicants List:** View a paginated list of all applicants, with a quick overview of their information.
*   **Search Functionality:** Search for specific applicants by name.
*   **Update Information:** Update the information of existing applicants.
*   **Delete Applicants:** Remove applicants from the database.
*   **View Profile:** View a detailed profile of each applicant.
*   **Dark Mode:** A dark mode option for user preference.

## Technology Stack

*   **Frontend:**
    *   HTML
    *   CSS (with Bootstrap)
    *   JavaScript (with jQuery)
*   **Backend:**
    *   PHP
    *   MySQL

## Prerequisites

Before you begin, ensure you have the following installed:

*   A web server (e.g., Apache, Nginx)
*   PHP
*   MySQL or MariaDB

## Installation and Setup

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/Index-Manger.git
    ```

2.  **Navigate to the project directory:**
    ```bash
    cd Index-Manger
    ```

3.  **Database Setup:**
    *   Open your MySQL database management tool (e.g., phpMyAdmin).
    *   Create a new database named `playersdb`.
    *   Import the `playersdb.sql` file (which you will need to create, see the **Database Schema** section below) into the `playersdb` database.

4.  **Database Configuration:**
    *   Open the `includes/Database.php` file.
    *   Update the database credentials (`$dbUser`, `$dbPassword`) if they are different from the defaults (`root` and an empty password).

5.  **Start your web server.**

6.  **Access the application:**
    *   Open your web browser and navigate to the project's URL (e.g., `http://localhost/Index-Manger`).

## Database Schema

You will need to create a `players` table in your `playersdb` database. Here is the SQL schema for the table:

```sql
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `sssidno` varchar(255) NOT NULL,
  `umidno` varchar(255) NOT NULL,
  `gsis` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Project Structure

```
Index-Manger/
├─── about.html
├─── ajax.php
├─── form.php
├─── help.html
├─── homepage.html
├─── index.php
├─── LICENSE
├─── playerstable.php
├─── profile.php
├─── README.md
├─── update.php
├─── css/
├─── documents/
├─── favicon_io/
├─── includes/
│    ├─── Database.php
│    └─── Player.php
├─── js/
├─── media/
└─── uploads/
```

## How to Use

1.  **Homepage:** The homepage provides an overview of the application and its features.
2.  **Application Form:** Click on the "Application Form" link in the sidebar to add a new applicant. Fill out the form and click "Submit".
3.  **Applicants' List:** Click on the "Applicants' List" link in the sidebar to view all the applicants.
    *   **Search:** Use the search bar to find applicants by name.
    *   **Edit:** Click the "Edit" button to modify an applicant's details.
    *   **Delete:** Click the "Delete" button to remove an applicant.
    *   **View:** Click the "View" button to see the full profile of an applicant.
4.  **About Us:** Learn more about the creators of the application.
5.  **How it Works:** Get a quick guide on how to use the application.
6.  **Dark/Light Mode:** Toggle between dark and light mode using the switch in the sidebar.
