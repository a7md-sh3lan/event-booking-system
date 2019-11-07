# simple event booking system
a basic event booking system, where users can select from a number of two tickets (Student ticket for 200 EGP and Normal Ticket for 400), provide their name, email and phone number for each ticket booked.

# clone the project
in terminal:
git clone https://github.com/a7md-sh3lan/event-booking-system.git

# Run Lampp or whatever package that need to run apache and mysql

# in mysql create new database and name it "tickets" or somehow name

# in file .env
alter database with the name that you named database in mysql and put your username and password

# run migration to create tables in the database
php artisan migrate

# Push ticket types in database run the seeder
php artisan db:seed

# run the server
php artisan serve

# let's go
now go to your browser and go to " http://localhost:{port:8000}/ or http://localhost:8000/subscribe "

# Let's try:
try the avilable scenarios to book a ticket..

Thanks,

