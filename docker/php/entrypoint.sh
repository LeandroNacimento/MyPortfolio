#!/bin/sh
set -e

# Solo intentar cambiar permisos si somos root (Docker compose de dev normalmente)
if [ "$(id -u)" = "0" ]; then
    chown -R www-data:www-data /var/www/html/storage 2>/dev/null || true
    chown -R www-data:www-data /var/www/html/bootstrap/cache 2>/dev/null || true
fi

# Eliminar archivo hot de Vite si existe, para evitar colisiones
if [ -f "/var/www/html/public/hot" ]; then
    rm -f "/var/www/html/public/hot" 2>/dev/null || true
fi

# Corregir permisos del archivo database.sqlite si existe y somos root
if [ -f "/var/www/html/database/database.sqlite" ] && [ "$(id -u)" = "0" ]; then
    chown www-data:www-data /var/www/html/database/database.sqlite 2>/dev/null || true
fi

# Crear enlaces simbólicos si no existen
if [ ! -d "/var/www/html/public/storage" ]; then
    php artisan storage:link || true
fi

# Iniciar comando principal
exec "$@"
