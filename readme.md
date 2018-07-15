
### Prerequisites

To clone and run these project, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)) installed on your computer. From your command line:

```
NPM
Git
XAMPP
Composer
PHP version 7.0 or greater
MySQL version 5.0 or greater
```

### Installing

```bash
# Clone this repository
$ git clone https://github.com/jesraygarciano/proximacentauri.git

# Go into the repository
$ cd folder

# Install dependencies
$ composer install
$ npm install

# Modify your .env file
Next you need to make a copy of the .env.example file and rename it to .env inside your project root.

#Setup database config .env
...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=your-mysql-username
DB_PASSWORD=your-mysql-password

...

# Generate Project key
$ php artisan key:generate

# Run migration
$ php artisan migrate

# Run seed with dummy data
$ php artisan db:seed

# And run web server
$ php artisan Serve

```
