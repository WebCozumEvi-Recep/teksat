# Codex Build Paketi — Tekli Ürün Satış MVP

Bu repo, **Laravel 11 + Vue 3** tabanlı multi-domain, tek ürün satış operasyonu için MVP iskeletini içerir.

## Monorepo Yapısı

- `backend/`: Laravel API katmanı (auth, dashboard, domains, products, orders, public order, logistics, fraud).
- `frontend-admin/`: Vue 3 admin paneli (layout, dashboard, domain yönetimi, ürün/sipariş listesi, COD, fraud).

## Backend Notları

- Service layer:
  - `OrderCreationService`
  - `RiskScoringService`
  - `DomainResolverService`
- Request validation:
  - `StoreDomainRequest`
  - `StoreProductRequest`
  - `UpdateProductRequest`
  - `PublicOrderStoreRequest`
- Standard API response: `App\Support\ApiResponse`
- MVP migration: `database/migrations/2026_04_20_000001_create_mvp_tables.php`
- Demo seed: `database/seeders/DemoSeeder.php`

## Frontend Notları

- Layout:
  - `AppShell`, `Sidebar`, `Topbar`
- Ortak UI:
  - `StatCard`, `StatusBadge`, `AppTable`, `AppDrawer`
- Sayfalar:
  - `/dashboard`
  - `/domains`
  - `/products`
  - `/orders`
  - `/logistics/cod-payments`
  - `/security/fraud`

## Kurulum (Özet)

### Backend

1. Laravel projesi ile bu klasörleri birleştirin.
2. `.env` ayarlayıp MySQL/Redis bağlantılarını yapın.
3. `php artisan migrate`
4. `php artisan db:seed --class=DemoSeeder`
5. `php artisan serve`

### Frontend

1. `frontend-admin` içinde Vite + Vue + Tailwind kurulumu yapın.
2. `npm install`
3. `npm run dev`

## MVP Kapsamı

1. Auth endpoint iskeleti
2. Dashboard summary
3. Domains list/create
4. Products CRUD
5. Orders list/detail drawer
6. Public order create API
7. COD payments ekranı
8. Fraud orders ekranı

> Not: Bu commit production-ready başlangıç iskeleti sağlar; gerçek auth, policy, queue, horizon, ve operasyonel entegrasyonlar bir sonraki fazlarda tamamlanmalıdır.
