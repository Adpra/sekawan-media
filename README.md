## Prerequisites

- PHP 8.1
- PostgreSQL 10.5

## Installation

1. Clone the GitHub repository:

   ```bash
   git clone https://github.com/Adpra/sekawan-media.git
   
2. Install the project dependencies using Composer:
    
      composer install

3. Run the database migrations:

      php artisan migrate

4. Seed the database with initial data:

      php artisan db:seed
      

## if you need a user to log in use this account

1. email: admin@gmail.com, password: 123456 as ADMIN
2. email: user_1@gmail.com, password: 123456 as MANAGER
3. email: user_2@gmail.com, password: 123456 as MANAGER

- or you can see it from the UserSeeder seeder folder

