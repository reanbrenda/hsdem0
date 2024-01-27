<p align="center">
    <a href="https://bluepundit.eu" target="_blank"><img src="https://bluepundit.eu/img/bluepundit-logo-pundit.png?1" height="100"></a><br>
    <a href="https://harbour.space" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Harbour.Space_Logo_2.png/800px-Harbour.Space_Logo_2.png" height="100" alt="Laravel Logo"></a></p>

## About Demo
Demo is a project that is used to demonstrate how to use Laravel to build a web
application.
It belongs to the course [Modern Web Application 1 - From Idea to MVP](https://harbour.space/computer-science/courses/modern-web-application-1-nico-deblauwe-946) at [Harbour.Space University](https://harbour.space/).
The lecturer is [Nico Deblauwe](https://bluepundit.eu).

The project is a simple blog where users can create an account, create posts, comment on posts and like posts and view news and uses News API to show latest headlines
and aslo has an extrenal API implemented

## Requirements
The project is built using the [TALL stack](https://tallstack.dev/), more specifically [Laravel 10](https://laravel.com) for the backend,
with [Tailwind CSS](https://tailwindcss.com/)
and [Alpine.js](https://alpinejs.dev/) for the frontend.

Tooling used for local development:
- [Ray](https://myray.app) for sending debug info to a separate app (paid)
- [Debugbar](https://github.com/barryvdh/laravel-debugbar) for displaying profiling data (free)
- [Mailgun] https://app.mailgun.com. for emails
- [Tinkerwell](https://tinkerwell.app/) for testing/debugging during development (paid)
- Flare for error reporting
- Cloudflare for back up
  

## Installation instructions
Clone the repository and install the dependencies:

```sh
git clone https://github.com/ndeblauw/hsdemo.git
composer install
```
Create a database and set the credentials in the .env file.

(Re)generate the tables and seed with dummy data
```sh
php artisan migrate:fresh --seed
```
Set the application key
```sh
php artisan key:generate
```


## Project currently runs at

   https://mukindia.cloudns.be/
## License
This project can only be used for educational purposes, not limited in time, nor to any institution. There are no rights to use this code for any other purpose. Please reference the orginal repository if you use this code.

