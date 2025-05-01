# Totsusho Webboard

A simple responsive public webboard system built with Laravel 12.

## Features

- Create and view topics
- Add comments to topics
- Anonymous posting supported
- Event logging for all actions
- Responsive design (Bootstrap 5)
- Seeder with dummy data

## Installation

### Requirements

- PHP 8.2+
- Composer
- MySQL or other Laravel supported DB

### Setup

```bash
git clone <repo>
cd totsusho-webboard
composer install
cp .env.example .env
php artisan key:generate
# configure database in .env
php artisan migrate --seed
php artisan serve
