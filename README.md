# Laracasts-laravel

## Setup

### For local development

#### First time Setup

```bash
# Clone the repository to your device.
git clone https://github.com/smitnet/bijblits.nl.git

# Copy the .env.example and change the copied file name to .env
cp .env.example .env

# Install composer packages with
composer install

# Generate an app key (dont use on production or staging)
php artisan key:generate

# Link the storage
php artisan storage:link

# ! When you are done with setting up the .env file proceed

# Add a local database matching DB_DATABASE in .env — default: 'bijblits'

# Migrate and seed the tables to your database
php artisan migrate:fresh --seed

# Publish assets for Laravel Nova
php artisan nova:publish

# Install NPM dependencies
npm install

# Compile styling assets (see scripts in package.json)
npm run dev

#### Start Environment
php artisan serve
```
#### Cronjob

In order to randomize the restaurants u need to add a cronjob

```
php artisan schedule:run >> /dev/null 2>&1
```

##### Database

Add the right database credentials in the `.env` file

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bijblits
DB_USERNAME=root
DB_PASSWORD=
```
