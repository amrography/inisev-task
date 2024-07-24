# Task <!-- omit in toc -->

Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system).
Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it

## Table of contents <!-- omit in toc -->

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Running the Project](#running-the-project)
- [Todo](#todo)
- [OPTIONAL](#optional)

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP `^8.2`
- MySql `^8.x`
- Composer `^2.x`

## Installation

Follow these steps to set up the project locally:

1. **Clone the repository:**

```sh
git clone git@github.com:amrography/inisev-task.git
```

2. **Navigate to the project directory:**

```sh
cd inisev-task
```

4. **Copy `.env` file`

```sh
cp .env.example .env
```

5. **Install the dependencies:**

```sh
composer install
```

6. **Replace database info**
7. **Generate app key and run the migrations**

```sh
php artisan key:generate
php artisan migrate --seed
```

## Running the Project

After installation, you can run the project using the following command:

```sh
php artisan serve
```

This will start the development server and you can view the project in your browser at `http://localhost:8000/`, or check your terminal output for more details

## Todo

- [ ] Create the required migrations
- [ ] Seeded data of the websites
- [ ] Endpoint to create a "post" for a "particular website".
- [ ] Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- [ ] Use of command to send email to the subscribers
  - *command must check all websites and send all new posts to subscribers which haven't been sent yet*
  - *Use of queues to schedule sending in background*
  - *No duplicate stories should get sent to subscribers*

## OPTIONAL

- Open API documentation (or) Postman collection demonstrating available APIs & their usage.
- Use of contracts & services.
- Use of caching wherever applicable.
- Use of events/listeners.
