# Manual for use

To use this app user must set up database and run the laravel. First user must install server and larvel:
https://www.apachefriends.org/index.html
https://laravel.com/docs/7.x/installation

# Setting up database

1. Create new mysql database with any name. 
2. Go to .env file that is located in root of the app. 
3. DB_HOST must eqal the adress of the database.
4. DB_PORT must equal port on wich database is working. 
5. DB_DATABASE must equal the name of user's database (from the step 1)
6. DB_USERNAME must equal the username of the database
7. DB_PASSWORD must equal the password of the database (leave it empty if there is no password)
8. Run the folder where this app is in the terminal
9. Type: php artisan migrate

# Downloading from git hub

1. Create new folder with any name
2. Open that folder in terminal
3. Run command: laravel new
4. Copy files from git hub into the folder (overwritte all)

# Runing the app

1. Make sure that database and php are running. 
2. Run the folder where this app is in the terminal
3. Type: php artisan serve
4. Go to the link what is provided