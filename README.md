Please fine below steps to install and run the application.

1. Import sql file
2. Add the changes in .env file with local credentials and change the DB_DATABASE name to bookstore
3. Since .env and vendor folder are ignored by git please run below command to generate autoload file
    composer update
4. Once autoload files are generated add this whole application folder inside xampp or laragon server. Restart the serve once
   project is added.
5. Once project is added inside local server and DB is setup, please add bookstore.test in url section of preferred browser
6. Please use below credentials to login via admin
    username - priya@test.com
    password - priya9498
7. On logging in via admin you will see options to add, edit and delete both users and books.
8. If normal user is created adding user and book option wont be visible. The user can access all the book details via    search and filter and add them in theri cart and view the same.
