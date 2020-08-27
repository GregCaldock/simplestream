## Installing Locally

To install the API locally for development, you'll need to follow these steps:

1. Install Homestead
1. Clone the repo
1. Launch Vagrant and SSH into the new instance
1. Create the database
1. Install dependencies
1. Run the Database migration and seeder
1. Start the Laravel instance
1. Browse to the site
1. Run the tests
1. Use the Postman scripts

### Install Homestead

Follow the instructions at https://laravel.com/docs/homestead.

####DO NOT START THE VAGRANT INSTANCE JUST YET

You'll also need to add a file and site configuration to the `Homestead.yaml` file, the following is for OSX and Linux - Windows will be mapped differently:

```yaml
folders:
    - map: ~/code/simplestream
      to: /home/vagrant/code

sites:
    - map: simplestream.test
      to: /home/vagrant/code/public
```

### Clone the repo

Create a `code` folder in your home directory, and clone the SimpleStream repo into it:
```bash
mkdir ~/code
```

```bash
cd ~/code
```

```bash
git clone https://github.com/GregCaldock/simplestream.git
```

### Launch Vagrant and SSH into the new instance
From the root of Homestead (~/Homestead):
```bash
vagrant up
```

```bash
vagrant ssh
```
Then browse to the project root:
```bash
cd /home/vagrant/code
```

While still logged into the vagrant instance:

### Create the database

Connect to the Homestead MySQL server and create a new database called `homestead` (if it doesn't exist already). 

### Edit the Laravel .env file
Edit the database settings
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=33060
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

### Install dependencies

Install Laravel and the other app dependencies via composer:

```bash
composer install
```

### Run the Database migration and seeder
Run the following artisan commands to set up the database

```bash
php artisan migrate
```
```bash
php artisan db:seed
```

### Fire up laravel
```bash
php artisan serve
```

### Browse to the site
The basic site should be available at http://127.0.0.1:8000

### Run the tests
```bash
php artisan test
```

### Run the Postman scripts
The Postman script collection can be import from `simplestream.postman_collection.json` in the project root

The Postman Environment can be found at `simplestream.postman_environment.json`

The channel, timetable and programme UUID's are generated when the database is seeded.

Use Postman to get the channels response and update the channel_id environment variable with one of the returned UUIDs.

Use Postman to get the timetable response ans update the programme_id environment variable with one of the programme's UUIDs
