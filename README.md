# Daybook Tasks for Today

IT0049 TSA3 — Angelo Kacey N. Pineda, TW33.

Four Laravel pages backed by Eloquent: Today (`/`), all tasks (`/tasks`), profile (`/profile`), and About (`/about`). Today displays only the tasks scheduled for the current Philippine date. All tasks are ordered by date, then ID. The profile displays the single seeded user.

## Local setup

Requires PHP 8.2 or later with PDO SQLite and normal Laravel extensions, plus Composer.

```powershell
composer install
Copy-Item .env.example .env
New-Item -ItemType File database/database.sqlite
php artisan key:generate
php artisan migrate --seed
php artisan serve --host=127.0.0.1 --port=8073
```

Open http://127.0.0.1:8073. After setup, start-local.cmd starts the development server. No npm build is required; CSS and JavaScript are served directly from public/.

## Schema and sample data

- tasks: id, title, status default pending, task_date, timestamps.
- users: id, unique username, full_name, email, timestamps.
- DatabaseSeeder creates eight tasks across yesterday, today, and tomorrow, plus exactly one user on a fresh database. Rerunning the seeder updates the same records without duplicating them and refreshes their relative dates.
- The email angelo.pineda@example.com is sample data. There is no login, authentication, or task editing in this assessment.
- APP_TIMEZONE defaults to Asia/Manila. After a date change, `/` automatically uses the new day. Run `php artisan db:seed` to refresh the demonstration schedule around the current date.

## Verification

```powershell
php artisan migrate:status
php artisan route:list --except-vendor
php artisan test --compact
```

Tests use an isolated in-memory SQLite database. They verify today's filter, exclusion of adjacent dates, Philippine midnight, ordering, the eight-task/one-user seed, repeatable seeding, profile/About responses, and the database default status.

## Source and submission

Repository: https://github.com/Angelowww11/TSA3_Laravel_Tasks

Migrations and the seeder are included. The local database, .env, vendor, evidence screenshots, and Word documents are excluded from the repository. Hosting is deferred at the user's request.

The botanical design continues the earlier project style, inspired by https://dribbble.com/shots/27544505-Vivid-Website, using original generated landscape artwork and motion with a pause control and reduced-motion support.

References: https://laravel.com/docs/12.x/eloquent and https://laravel.com/docs/12.x/migrations.
