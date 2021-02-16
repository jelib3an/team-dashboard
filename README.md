## About Team Dashboard

Specially designed for remote teams spread across multiple timezones. Dashboard allows user to see the local times of team members and whether they are currently available. Can also preview future times to make meeting scheduling easier.

Built with [Laravel Livewire](https://laravel-livewire.com/). 

## Demo

View a demo dashboard [here](https://demo-team-dashboard.herokuapp.com/dev-team).

## Installation

Copy `.env.example` to `.env` and fill in your local configuration (`php artisan key:generate`, database, etc)

```bash
composer install
php artisan migrate --seed
```

