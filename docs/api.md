# API Documentation

This document provides details about the AJAX API endpoints used in the Index Manager application. All API requests are handled by `ajax.php`.

## Endpoints

### 1. `adduser`

*   **Action:** `adduser`
*   **Method:** `POST`
*   **Description:** Adds a new applicant or updates an existing one. If an `userid` is provided, it updates the existing user; otherwise, it adds a new user.
*   **Parameters:**
    *   `username` (string): The full name of the applicant.
    *   `occupation` (string): The applicant's occupation.
    *   `gender` (string): The gender of the applicant.
    *   `email` (string): The email address of the applicant.
    *   `phone` (string): The phone number of the applicant.
    *   `address` (string): The street address of the applicant.
    *   `city` (string): The city of residence of the applicant.
    *   `zip` (string): The zip code of the applicant.
    *   `birth` (date): The applicant's date of birth.
    *   `civilstatus` (string): The civil status of the applicant.
    *   `citizenship` (string): The citizenship of the applicant.
    *   `religion` (string): The religion of the applicant.
    *   `sss` (string): The SSS ID number of the applicant.
    *   `umid` (string): The UMID number of the applicant.
    *   `gsis` (string): The GSIS number of the applicant.
    *   `pagibig` (string): The Pag-ibig ID number of the applicant.
    *   `philhealth` (string): The Philhealth number of the applicant.
    *   `date` (date): The date the application was submitted.
    *   `photo` (file): The applicant's photo.
    *   `document` (file): The applicant's PDF document.
    *   `userid` (integer, optional): The ID of the user to be updated.
*   **Returns:** A JSON object representing the newly added or updated applicant.

### 2. `getusers`

*   **Action:** `getusers`
*   **Method:** `GET`
*   **Description:** Retrieves a paginated list of applicants.
*   **Parameters:**
    *   `page` (integer, optional): The page number to retrieve. Defaults to `1`.
*   **Returns:** A JSON object containing the total count of applicants and a list of applicant objects for the current page.

### 3. `getuser`

*   **Action:** `getuser`
*   **Method:** `GET`
*   **Description:** Retrieves a single applicant's data.
*   **Parameters:**
    *   `id` (integer): The ID of the applicant to retrieve.
*   **Returns:** A JSON object representing the requested applicant.

### 4. `deleteuser`

*   **Action:** `deleteuser`
*   **Method:** `GET`
*   **Description:** Deletes an applicant's record.
*   **Parameters:**
    *   `id` (integer): The ID of the applicant to delete.
*   **Returns:** A JSON object with a `deleted` status (`1` for success, `0` for failure).

### 5. `search`

*   **Action:** `search`
*   **Method:** `GET`
*   **Description:** Searches for applicants by name.
*   **Parameters:**
    *   `searchQuery` (string): The search term.
*   **Returns:** A JSON object containing a list of matching applicant objects.
