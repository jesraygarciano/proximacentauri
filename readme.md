<p align="center">
    <img src="https://raw.githubusercontent.com/NexSeed/Beagle/j_0430_newbranch/5.5/public/img/laravel-logo.png?token=AQgTp7SvESPgI_83i4NbhjfGulAIMSw4ks5a77_3wA%3D%3D">
    <img src="https://raw.githubusercontent.com/NexSeed/Beagle/j_0430_newbranch/5.5/public/img/nexseed.png?token=AQgTp8Y9l9jdYFlEhRHBFM9agRLMK2sKks5a77_gwA%3D%3D">

</p>
<p align="center">
    <img src="https://raw.githubusercontent.com/NexSeed/Beagle/j_0430_newbranch/5.5/public/img/gs.png?token=AQgTp_p87qZ53eAewbVjLZyGJyhcAkQpks5a773BwA%3D%3D">
</p>

## Table of Contents

- [Internship Training Program](#internship-training-program)
- [Project Beagle](#project-beagle)
- [Getting Started](#getting-started)
- [Prerequisites](#prerequisites)
- [Installing](#installing)
- [Bugs and Feature Request](#feature-request)
- [Built With](#built-with)
- [Authors](#authors)
- [License](#license)
- [Acknowledgments](#acknowledgments)

# Internship Training Program

A training program for aspiring students, which aims to help students who are into software development to access high value jobs from the high-demand sector.

# Project Beagle

Project Beagle is committed to help companies of all sizes and job seekers with talent connects by keeping features super simple and improve lives through better careers.


## Getting Started

The ITP and Beagle projects are using the same *Database*. Cloning both *5.1* and *new_environment* are necessary.

#### Kindly see directory structure and their explanation below:
- **5.1:** First beagle project built from scratch, made from Laravel 5.1
- **5.5:** Contains the Internship Training Program (ITP) project
- **new_environment:** Project beagle integrated to Laravel 5.5, currently used and updated

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
$ git clone https://github.com/NexSeed/Beagle.git

# Go into the repository
$ cd beagle

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

# Apply commands below to each subdirectories - 5.5, new_environment - then the following commands using terminal

# Generate Project key
$ php artisan key:generate

# Run migration
$ php artisan migrate

# Run seed with dummy data
$ php artisan db:seed

# And run web server
$ php artisan Serve

```

## Feature Request

Please use create Zenhub issues to report any bugs or file feature requests.

## Built With

* [Laravel](http://www.laravel.com) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management
* [NodeJS](https://nodejs.org/en/) - Used to generate RSS Feeds
* [NPM](https://nodejs.org/en/) - Package Manager

<!-- 
## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).  -->

## Authors

* **Beagle Team** - *Initial work* - <!-- [PurpleBooth](https://github.com/PurpleBooth) -->


## License

* This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
* Copyright @ [Nexseed](http://www.nexseed.net)

## Acknowledgments

* Hat tip to anyone who's code was used
* 2Quad/ FLB Building