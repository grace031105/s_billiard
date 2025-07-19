# Web-Based Billiard Table Booking and Reservation Application

This web application is used to make billiard table reservations online. Users can choose the type of table (Regular, VIP, Platinum), select a schedule, and place a booking. The purpose of this application is to simplify the reservation process and avoid queues at the venue.


## Installation

Clone the project

```bash
  git clone https://github.com/grace031105/s_billiard
```

Go to the project directory

```bash
  cd s_billiard
```

Install dependencies

```bash
  composer install
```

Start the server

```bash
  php artisan server
```

Create Storage symlink

```bash
  php artisan storage:link
```

Import the Database

```bash
  Make sure you have MySQL and phpMyAdmin installed. then:
    1. open http://localhost/phpmyadmin 
    2. Create a new database named billiard
    3. Go to the import tab
    4. Upload the file billiard.sql (provided in this project)
    5. Click Go

  The billiard.sql file located in a folder named /database.
```
##  Usage

- Open the homepage in your browser.
- Choose a table type: **Regular**, **VIP**, or **Platinum**.
- Click the **“Select Schedule”** button to display the booking form as a pop-up.
- Fill in the booking form and click **Submit**.
- The reservation details will then be displayed clearly on a separate page.
- **Customers** can view their reservation information immediately after booking.
- **Owners** can log in to manage and view all reservations in the system.


## Demo

http://localhost:8000/dash-public

## Link 

- [Video Demo Aplikasi](https://youtu.be/iaSmGD0ZnLg?si=7BH9pzQ95goZ0yBy)
- [Video Presentasi](https://youtu.be/8FyJ-mjiCM0?si=RFNZ1BscbwU38Ga2)
- [Laporan AAS](https://drive.google.com/drive/folders/1AFfDGY4TZaRuMKOZNW6SSCXrHgNz5SU5?usp=sharing )

## Credits

- **Grace Anastasya Simanungkalit** – 3312401073  
- **Jesica Kristina Manalu** – 3312401069  
- **Zahra Ufairah** – 3312401060  
- **Zahrah Nazihah Ginting** – 3312401077  

Project developed as part of a PBL (Project-Based Learning) assignment.
