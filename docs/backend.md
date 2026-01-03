# Backend Documentation

This document provides an overview of the backend structure and functionality of the Index Manager application.

## Technologies Used

*   **PHP:** A server-side scripting language used to handle the application's logic and interact with the database.
*   **MySQL:** A relational database management system used to store the application's data.
*   **PDO (PHP Data Objects):** A database access layer providing a uniform method of access to multiple databases.

## File Structure

The backend files are organized as follows:

*   `ajax.php`: This file acts as the main controller for all AJAX requests from the frontend. It receives requests, calls the appropriate methods in the `Player` class, and returns the results in JSON format.
*   `includes/`: This folder contains the core backend classes.
    *   `Database.php`: This file contains the `Database` class, which handles the connection to the MySQL database.
    *   `Player.php`: This file contains the `Player` class, which extends the `Database` class and handles all the business logic for the application, including CRUD (Create, Read, Update, Delete) operations and file uploads.

## `Database` Class (`includes/Database.php`)

The `Database` class is responsible for establishing a connection to the MySQL database.

*   **Properties:**
    *   `$dbServer`: The database server hostname (e.g., `localhost`).
    *   `$dbUser`: The database username.
    *   `$dbPassword`: The database password.
    *   `$dbName`: The name of the database.
    *   `$conn`: The PDO connection object.
*   **`__construct()`:** The constructor method initializes the PDO connection and handles any connection errors.

## `Player` Class (`includes/Player.php`)

The `Player` class contains the core business logic of the application. It extends the `Database` class to inherit the database connection.

*   **Properties:**
    *   `$tableName`: The name of the database table (`players`).
*   **Methods:**
    *   `add($data)`: Adds a new player to the database.
    *   `update($data, $id)`: Updates an existing player's information in the database.
    *   `getRows($start, $limit)`: Retrieves a paginated list of players from the database.
    *   `deleteRow($id)`: Deletes a player from the database.
    *   `getCount()`: Gets the total number of players in the database.
    *   `getRow($field, $value)`: Retrieves a single player's information based on a specific field and value.
    *   `searchPlayer($searchText, $start, $limit)`: Searches for players by name.
    *   `uploadPhoto($file)`: Uploads a player's photo to the `uploads/` directory.
    *   `uploadDocument($file)`: Uploads a player's PDF document to the `documents/` directory.

## `ajax.php` Controller

The `ajax.php` file is the entry point for all backend operations initiated from the frontend. It uses a `switch` statement on the `action` parameter to determine which operation to perform.

*   **`adduser`:** Handles both adding and updating players. It checks for the presence of an `userid` to determine whether to call the `add()` or `update()` method of the `Player` class.
*   **`getusers`:** Retrieves a paginated list of players.
*   **`getuser`:** Retrieves a single player's information.
*   **`deleteuser`:** Deletes a player.
*   **`search`:** Searches for players.

Each action calls the corresponding method in the `Player` class and returns the result to the frontend as a JSON-encoded string.
