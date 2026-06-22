#!/bin/sh
set -e

# Asegurar que el directorio de storage y bootstrap/cache tengan permisos correctos
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

# Eliminar archivo hot de Vite si existe, para evitar colisiones entre contenedores/reinicios
if [ -f "/var/www/html/public/hot" ]; then
    rm -f "/var/www/html/public/hot"
fi

# Corregir permisos del archivo database.sqlite si existe
if [ -f "/var/www/html/database/database.sqlite" ]; then
    chown www-data:www-data /var/www/html/database/database.sqlite
fi

# Crear enlaces simbólicos si no existen (ejecutado como www-data)
if [ ! -d "/var/www/html/public/storage" ]; then
    su -s /bin/sh www-data -c "php artisan storage:link" || true
fi

# Iniciar comando principal (php-fpm)
exec "$@"
