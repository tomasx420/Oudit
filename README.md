# OuDit - Outokumpu Audit/Action Management System

### Course: Framework Project 2

## Project description:
Effective audit management is crucial for organizations to ensure regulatory compliance, identify operational gaps, and mitigate risks. Our client Outokumpu Stainless (Terneuzen) is conducting audits throughout the whole organization at different levels. Currently, the management of the audits in the company is disjointed and fragmented – audits are done on paper, custom apps, forms, etc. There is no full overview of audits to be done, and planned, the actions resulting from them and how findings in different areas interconnect. Therefore, this affects compliance with internal and external norms.
The Outokumpu audit management system (or OuDit for short) is a web application designed and created during the second semester of the first year of the ICT programme – courses Framework Project 1 & 2. OuDit came in existence because of our customer’s need to centralize the auditing process in the company. The high-level goal is to enhance the efficiency, accuracy, and transparency of the audit management process and the actions that are evoked during the process.

## Local Set-up (XAMPP)
1) Clone the repo
2) Run `composer install`
3) Set up the host
4) Copy the `.env.example` in `.env` file
5) Run `php artisan key:generate`
6) Run `php artisan migrate`
7) Run `php artisan db:seed`
8) Run `npm install`
9) Run `npm run build`

## Local Set-up (DOCKER)
1) Clone the repo
2) Run `composer install` and `npm install`
3) Copy `.env.example` to `.env`
4) Run `php artisan key:generate`
5) Run `./vendor/bin/sail up -d`
6) Run `./vendor/bin/sail php artisan migrate`
7) Run `./vendor/bin/sail npm run dev`

## Implementation

### The database
![image](https://github.com/HZ-2223/fpr-team05/assets/112815173/5daa98cc-1c02-4524-aaf7-ff5071a2331f)
The evolution of the database can be followed on the wiki page of the repo, but this is the final ERD.

### The seeded data
When `php artisan db:seed` is executed the data that is being filled in the database is the following:
* A user with admin credentials;
* 10 users with no admin credentials that also have to be approved;
* 6 types of audits;
* All of the questions for all of the types;
* Departments
* Teams within departments

### Authentication
The authentication is created using [Laravel Breeze](https://github.com/laravel/breeze)

### Design
The design is created mostly with [Tailwind CSS](https://tailwindcss.com) and [Bulma](https://bulma.io)

## Credits:

**Valeria Stamenova** - [v-stamenova](https://github.com/v-stamenova)
**Tomas Tomkevicius** - [tomasx420](https://github.com/tomasx420)
**Aris Zajti** - [ArisZajti]([https://github.com/v-stamenova](https://github.com/ArisZajti))
**Martin Georgiev** - [martingeorgiev99](https://github.com/martingeorgiev99)
