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
git clone https://github.com/hackdevmariana/spanewsapi.git
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

- [x] Base models & admin panel
- [ ] Scraping engine / RSS parser
- [ ] Public API endpoints
- [ ] API authentication (API keys, rate limits)
- [ ] Documentation site


## Contributing

Pull requests are welcome! Please open an issue first to discuss any major changes or new features.


## License

This project is licensed under the GNU General Public License v3.0 (GPLv3).



# SpaNewsAPI

**SpaNewsAPI** es una API de código abierto basada en Laravel que permite recopilar y servir noticias locales y regionales de pequeños pueblos y zonas rurales de España. Está pensada para proyectos centrados en eventos locales—como fiestas populares—que necesitan acceder a noticias relevantes mediante un formato JSON estandarizado.

---

## Características

- Gestión de una base de datos de medios de comunicación con:
  - Nombre, slug, URL, URL del RSS
  - Correo de contacto
  - Ámbito geográfico (local, provincial, regional, nacional)
  - Temática principal
  - Asociación a municipio y provincia
- Almacenamiento y filtrado de noticias obtenidas por RSS o scraping
- Clasificación basada en etiquetas y temáticas
- Posibilidad de destacar artículos durante un intervalo de fechas
- Panel de administración con [Filament](https://filamentphp.com/)
- Estructura geográfica completa:
  - Comunidades autónomas
  - Provincias
  - Municipios (incluyendo pedanías)

---

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL o MariaDB
- Node.js + npm (para compilar assets)
- Laravel 10+
- Panel de administración Filament

---

## Instalación

```bash
git clone https://github.com/hackdevmariana/spanewsapi.git
cd spanewsapi
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve
```


## Uso

- Accede al panel de administración en /admin

- Usa Filament para gestionar:

    - Medios de comunicación

    - Artículos

    - Etiquetas

    - Temáticas

    - Municipios / Provincias / Comunidades Autónomas

- Los endpoints de la API (próximamente) permitirán:

    - Consultar artículos por ubicación, etiqueta o temática

    - Filtrar por medio de comunicación

    - Obtener noticias destacadas



## Hoja de ruta

- [x] Modelos base y panel de administración
- [ ] Motor de scraping / parser de RSS
- [ ] Endpoints públicos de la API
- [ ] Autenticación de API (claves, límites de uso)
- [ ] Sitio web de documentación


## Contribuciones

¡Las pull requests son bienvenidas! Por favor, abre un issue antes para debatir cambios importantes o nuevas funcionalidades.

## Licencia

Este proyecto está licenciado bajo la GNU General Public License v3.0 (GPLv3).
Consulta el archivo LICENSE para más información.
