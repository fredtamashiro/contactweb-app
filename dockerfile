# Base PHP com Apache
FROM php:8.1-apache

# Instalar dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    unzip \
    git \
    && docker-php-ext-install \
    gd \
    mysqli \
    pdo \
    pdo_mysql \
    bcmath \
    intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Habilitar o modo rewrite do Apache
RUN a2enmod rewrite

# Ajustar o diretório de trabalho
WORKDIR /var/www/html/public

# Configurar o Apache para apontar para o diretório public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf


# Configurar as permissões corretas
RUN chown -R www-data:www-data /var/www/html/public && chmod -R 775 /var/www/html/public

# Expor a porta 80
EXPOSE 80
