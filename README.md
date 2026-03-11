# spa-saas
Plataforma SaaS multi-tenant para spas de masajes en PHP puro (MVC).

## Requisitos
- PHP 8+
- MySQL 8
- XAMPP

## Solución al error `Unknown database 'spa_saas'`
El proyecto ahora intenta crear la base automáticamente si no existe (`config/app.php` -> `db.auto_create_database = true`).

Si prefieres inicializar manualmente:
1. Abre phpMyAdmin / MySQL CLI.
2. Ejecuta `database/schema.sql`.
3. Verifica que exista la BD `spa_saas`.

## Ejecución
1. Copiar carpeta a `htdocs/spa-saas`
2. Configurar `config/app.php` (host, usuario, password)
3. Abrir `http://localhost/spa-saas/public`

## Usuario demo
- Email: `superadmin@spa.local`
- Password: `password`
