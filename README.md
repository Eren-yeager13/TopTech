### Installation
```bash
git clone <url> 
```
```bash
cd TopTech-app
```

```bash
composer install
```
```bash
npm install
```

## How Lunch the app

1. Migrate the DB files into your DB
```bash
php artisan migrate
```
    or you can find SQL file in database folder named TopTech.sql

2. for Lunch The App use this command to create a listen port

```bash
php artisan serve
``` 
```bash
npm run dev
``` 
3-config your connection to your database :
1. Go to `.env` file and change DB_Connection parameters 
2. Create a user if not exists go to responsable table and insert user info
