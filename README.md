<h2>Todo List</h2>
<p>We are saving Task with UTC timezone and then when any public user want to see the task it will show deadline of that task according to his timezone.
</p>
<h3>Step To Run Project </h3>
<b>
Laravel Version: Laravel v8.20.1 (PHP v7.4.13)
</b></br>


1. composer Install 

2. npm install

3. Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env

4. Generate a new application key

php artisan key:generate


5. Start the local development server

php artisan serve

6. Run the database migrations (Set the database connection in .env before migrating)
   php artisan migrate

<h2>Database </h2>

Create DB with name  = todolist (according to env)

7. php artisan migrate
