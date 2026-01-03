# Frontend Documentation

This document provides an overview of the frontend structure and components of the Index Manager application.

## Technologies Used

*   **HTML:** The standard markup language for creating the web pages.
*   **CSS:** Used for styling the application, with the help of the Bootstrap framework.
*   **JavaScript:** Used for dynamic functionality and interactivity, with the help of the jQuery library.
*   **Bootstrap:** A popular CSS framework for building responsive and mobile-first websites.
*   **jQuery:** A fast, small, and feature-rich JavaScript library that simplifies HTML document traversing, event handling, animating, and Ajax interactions.
*   **Boxicons:** A high-quality set of open-source icons.

## File Structure

The frontend files are organized into the following folders:

*   `css/`: Contains the stylesheets for the application.
    *   `style.css`: The main stylesheet for the application.
    *   `form.css`: Styles specific to the applicant form.
    *   `modal.css`: Styles for the modal dialogs.
    *   `about.css`: Styles for the "About Us" page.
*   `js/`: Contains the JavaScript files.
    *   `script.js`: The main JavaScript file that handles user interactions and AJAX requests.
*   `media/`: Contains images, GIFs, and other media files used in the application.
*   `AboutUsImages/`: Contains images for the "About Us" page.
*   `favicon_io/`: Contains the favicon files for the application.

## Key Frontend Components

### 1. Sidebar Navigation

*   **File:** `index.php`, `form.php`, `homepage.html`, `help.html`, `about.html`
*   **Description:** The sidebar provides navigation to the different pages of the application: Homepage, Application Form, Applicants' List, How it works, and About us. It also includes a dark mode toggle switch.

### 2. Applicant Table

*   **File:** `index.php`, `playerstable.php`
*   **Description:** The main page displays a table of applicants with their basic information. The table is paginated and can be searched.

### 3. Applicant Form

*   **File:** `form.php`
*   **Description:** A comprehensive form for adding and editing applicant information. It includes various input fields for personal details, contact information, and government IDs, as well as file inputs for a photo and a PDF document.

### 4. Modals

*   **File:** `update.php`, `profile.php`
*   **Description:** The application uses modals to display the applicant profile and to update applicant information.

### 5. Search Bar

*   **File:** `index.php`
*   **Description:** A search bar that allows users to search for applicants by name.

### 6. Dark Mode

*   **File:** `js/script.js`, `css/style.css`
*   **Description:** The application has a dark mode feature that can be toggled using a switch in the sidebar. The user's preference is stored in local storage.

## JavaScript (`script.js`)

The `js/script.js` file is the core of the frontend logic. It handles the following:

*   **AJAX Requests:** It makes AJAX requests to `ajax.php` to perform CRUD operations (Create, Read, Update, Delete).
*   **DOM Manipulation:** It dynamically updates the content of the web pages, such as the applicant table and modals.
*   **Event Handling:** It handles user events, such as button clicks, form submissions, and search input.
*   **Pagination:** It implements the pagination functionality for the applicant table.
*   **Dark Mode:** It handles the toggling of dark mode and stores the user's preference.
