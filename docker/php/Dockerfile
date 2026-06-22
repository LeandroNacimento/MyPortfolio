# ==========================================
# Node Builder Stage (Compilación de Assets)
# ==========================================
FROM node:22-alpine AS node-builder
WORKDIR /app
COPY package.json ./
RUN npm install
COPY . .
RUN npm run build

# ==========================================
# Base Stage (Dependencias comunes)
# ==========================================
FROM php:8.5-fpm-alpine AS base

# Instalar utilidades del sistema y librerías requeridas por PHP
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite-dev \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    bash \
    shadow \
    fcgi

# Configurar e instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo_sqlite \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Ajustar UID/GID de www-data para que coincida con el host local
ARG UID=1000
ARG GID=1000
RUN usermod -u ${UID} www-data \
    && groupmod -g ${GID} www-data

# ==========================================
# Development Stage (Entorno local)
# ==========================================
FROM base AS development

# Instalar Xdebug
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del -f .build-deps

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Asegurar propiedad de los directorios para el usuario no-root
RUN chown -R www-data:www-data /var/www/html

# Correr el contenedor como el usuario www-data
USER www-data

# ==========================================
# Production Stage (Entorno productivo)
# ==========================================
FROM base AS production

# Instalar Nginx
RUN apk add --no-cache nginx

# Configurar Nginx para producción
COPY docker/nginx/default.prod.conf /etc/nginx/http.d/default.conf

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar el código fuente
COPY . /var/www/html

# Instalar dependencias de PHP sin devDependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copiar assets compilados desde el stage de node
COPY --from=node-builder /app/public/build /var/www/html/public/build

# Permisos para Nginx y PHP-FPM sin requerir root
RUN chown -R www-data:www-data /var/www/html \
    && chown -R www-data:www-data /var/lib/nginx \
    && chown -R www-data:www-data /var/log/nginx \
    && mkdir -p /run/nginx \
    && chown -R www-data:www-data /run/nginx

# Usar el script de entrypoint
COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Ejecutar el contenedor como usuario no privilegiado (www-data)
USER www-data

# Nginx en producción escuchará en el 8080 (se mapeará en Azure Container Apps a 80/443)
EXPOSE 8080

# Iniciar PHP-FPM en background (-D) y Nginx en foreground
CMD php-fpm -D && nginx -g "daemon off;"
