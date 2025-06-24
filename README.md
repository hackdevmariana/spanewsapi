# SpaNewsAPI

**SpaNewsAPI** is an open-source Laravel-based API designed to aggregate and serve local and regional news from small towns and rural areas across Spain. It helps projects focused on local events—like town festivals—discover relevant news and sources through a standardized JSON format.

---

## Features

- Manage a database of media sources with:
  - Name, slug, URL, RSS URL
  - Contact email
  - Geographic scope (local, provincial, regional, national)
  - Main topic
  - Associated municipality and province
- Store and filter news articles collected via RSS or scraping
- Tag-based and topic-based classification
- Highlight featured articles between custom date ranges
- Admin panel using [Filament](https://filamentphp.com/)
- Full geographic structure:
  - Autonomous communities
  - Provinces
  - Municipalities (including hamlets)

---

## Requirements

- PHP 8.2+
- Composer
- MySQL or MariaDB
- Node.js + npm (for asset building)
- Laravel 10+
- Filament Admin Panel

---

## Installation

```bash
git clone https://github.com/yourusername/spanewsapi.git
cd spanewsapi
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve
```

## Usage

- Access the admin panel at /admin

- Use Filament to manage:

    - Media sources

    - Articles

    - Tags

    - Topics

    - Municipalities / Provinces / Autonomous Communities

- API endpoints (coming soon) will allow:

    - Querying articles by location, tag, topic

    - Filtering by media source

    - Retrieving featured news

## Roadmap

[X] Base models & admin panel

[ ] Scraping engine / RSS parser

[ ] Public API endpoints

[ ] API authentication (API keys, rate limits)

[ ] Documentation site

## Contributing

Pull requests are welcome! Please

## License

This project is open-sourced under the GPL license.

