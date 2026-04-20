# Multi-Domain COD E-commerce Platform

Monorepo containing:

- `backend/`: Laravel 11 API + domain-rendering backend
- `frontend-admin/`: Vue 3 admin panel
- `public-landing/`: Blade-based landing templates

## Core Features

- Multi-domain product routing and template rendering
- Unified COD order flow and lifecycle logging
- Logistics + COD reconciliation pipeline
- Fraud detection (risk score + blacklist)
- KPI dashboard + reporting modules

## System Design Principles

- Clean architecture (domain/application/infrastructure boundaries)
- Module-oriented API design
- Queue-first async processing for scale (Redis + Horizon)
- Token-based admin access using Sanctum

## Quick Start

### Backend

```bash
cd backend
composer install
php artisan migrate
php artisan serve
```

### Frontend Admin

```bash
cd frontend-admin
npm install
npm run dev
```
