Project Configuration Guide

This document outlines the steps to configure the project, including setting up the database, updating environment variables, adjusting timezone settings, installing dependencies, migrating the database schema, and running the project along with scheduled tasks for deleting expired messages.

1. Database Configuration:

Firstly, ensure you have a suitable database server installed and running. Then, follow these steps to create the necessary database for the project:

Access your database server (e.g., MySQL).
Create a new database for the project. You can use a SQL command or a GUI tool according to your preference.
Once the database is created, note down the database name, username, and password. You will need these for the next steps.

2. Update .env File:

Next, update the .env file in your project directory with the database connection details:

Locate the .env file in the root directory of your project.

Update the following variables with your database credentials:

DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

3. Update Timezone Settings:

Update the timezone setting in the .env file to match your location. This is required for managing the expiration time of messages:

Find the EXPIRE_MESSAGE_ZONE variable in the .env file.
Set it to your timezone. For example:

EXPIRE_MESSAGE_ZONE=America/New_York
Replace America/New_York with your timezone identifier.

4. Dependency Installation:

Before migrating the database schema, ensure all project dependencies are installed:

Open a terminal or command prompt.
Navigate to your project directory.

Run the following command to install dependencies using Composer:

composer install

5. Database Migration:

Migrate the database schema to create the necessary tables:

In the terminal or command prompt, within your project directory, execute the following command:

php artisan migrate

This command will create the required tables in your database based on the migrations defined in the project.

6. Run the Project:

You can now run the project locally to test it:

Start the Laravel development server by running the following command:

php artisan serve

This will start the development server, and you should be able to access the project in your web browser using the provided URL.

7. Scheduled Task for Expired Messages:

To ensure expired messages are deleted after the expiry date & time, you need to run the scheduled task.

Run the following command to start the scheduler worker:

php artisan schedule:work

This command will execute the scheduled command which is the deletion of expired messages.

With these steps completed, project should be properly configured and ready to use.