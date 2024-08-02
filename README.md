
---

# Recruitment Project for Netgraf

## Project Description

This project utilizes Laravel and REST API. It is an application where users can add, edit, and delete pets. It is also possible to filter pets by their status.

## Features

- Add a new pet
- Edit an existing pet
- Delete a pet
- Filter pets by status

## Installation

1. Copy the `.env.example` file to `.env` and fill in the necessary details.
2. Start the Docker containers:
    ```
    docker-compose up -d
    ```
3. Install PHP dependencies:
    ```
    docker-compose exec php composer install
    ```
4. Generate the application key:
    ```
    docker-compose exec server php artisan key:generate
    ```
5. Install Node.js dependencies:
    ```
    docker-compose exec server npm install
    ```
6. Build the frontend:
    ```
    docker-compose exec server npm run build
    ```
7. The application will be available at: [http://localhost](http://localhost)

## Usage

- You can add a new pet by clicking the "Create Pet" button and filling out the form.
- You can view details of a specific pet by clicking the "Show" button.
- You can edit a pet by clicking on the pet, updating the necessary details, and clicking "Update" or delete the pet by clicking the "Delete" button.
- The select dropdown next to the "Create Pet" button allows you to filter pets by a specific status.

## Running Tests

You can run tests from the terminal using the following command:
```
docker-compose exec server vendor/bin/phpunit --filter <test_name>
```
Replace `<test_name>` with the name of the test, e.g., `testStorePetThrowsExceptionOnFailure`.

---

This README provides a clear and concise guide for users and developers interacting with the project.
