# WSL-ABA System

The Autism Progress Tracking System is a sophisticated web application designed to track and monitor the progress of children diagnosed with autism. Developed using Laravel, MySQL, HTML, CSS, and JavaScript technologies, this system offers extensive features and a user-friendly interface to support caregivers and professionals in managing therapy sessions and analyzing progress effectively.

## Features:

- **Child Data Registration:** Capture and store detailed information about children with autism, including their personal details, family information, and therapy preferences.
- **ABLLS Sessions:** Conduct ABLLS (Assessment of Basic Language and Learning Skills) sessions to assess the child's progress across various developmental domains.
- **Vertical Charting:** Visualize the child's progress using vertical charts, allowing easy interpretation and analysis of the data.
- **Preference Sessions:** Record and analyze the child's preferences through preference sessions, facilitating personalized therapy approaches.
- **Goal Setting:** Set training goals for the child and track their progress, with the ability to view percentage scores and session-specific percentages.
- **Reporting:** Generate comprehensive reports summarizing all activities and training sessions undertaken by the child, aiding in holistic assessment and planning.

## Technologies Used:

- **Backend:** PHP (Laravel)
- **Frontend:** HTML5, CSS, JavaScript, Bootstrap
- **Database:** MySQL

## Usage:

1. Clone the repository to your local machine.
2. Install dependencies using Composer for PHP and npm.
3. Configure the database settings in the `.env` file.
4. Run migrations and seed the database to set up the initial data.
5. Launch the application and begin registering child data and conducting therapy sessions.


```shell
#dont forget to install 
composer install
# copy .env.example to .env
cp .env.example .env
# generate security key 
php artisan key:generate
# after connect your database via .env file
php artisan migrate:fresh
php artisan db:seed 
```
---
