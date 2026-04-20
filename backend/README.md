# Backend (Laravel 11)

Production-ready backend architecture for a multi-domain COD e-commerce platform.

## Architecture

- **Domain layer**: entities + business rules (`app/Models`, `app/DTOs`)
- **Application layer**: services/use-cases (`app/Services`)
- **Infrastructure layer**: repositories + framework adapters (`app/Repositories`, middleware, controllers)

## Key Capabilities

- Multi-domain host resolution with dynamic landing configuration
- Product/domain/site template management
- COD order lifecycle with shipment + reconciliation support
- Fraud scoring + blacklist checks
- Queue-ready async pipeline (Redis + Horizon)
- Sanctum-authenticated admin API

## Bootstrapping

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan horizon
php artisan serve
```
