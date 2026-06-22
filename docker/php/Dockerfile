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
# Esto evita problemas de permisos en la carpeta storage/
ARG UID=1000
ARG GID=1000
RUN usermod -u ${UID} www-data \
    && groupmod -g ${GID} www-data

# ==========================================
# Development Stage (Entorno local)
# ==========================================
FROM base AS development

# Instalar Xdebug
# Se usan dependencias virtuales (.build-deps) para compilar y luego se borran para ahorrar espacio
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
# Production Stage (Placeholder para Fase 4)
# ==========================================
FROM base AS production

# Aquí se copiará el código fuente y se omitirán las herramientas de dev.
# Se implementará en detalle cuando armemos la imagen de producción.
