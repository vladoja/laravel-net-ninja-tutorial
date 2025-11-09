FROM php:8.4-fpm-alpine

# System deps (incl. PHPIZE_DEPS for pecl/phpize and linux-headers for xdebug build)
RUN apk add --no-cache \
    bash git unzip curl \
    libpq-dev icu-dev oniguruma-dev \
    linux-headers \
    $PHPIZE_DEPS

# Core PHP extensions
RUN docker-php-ext-install -j"$(nproc)" intl mbstring pdo pdo_pgsql opcache

# Xdebug (optional; set INSTALL_XDEBUG=0 to skip at build time)
ARG INSTALL_XDEBUG=1
RUN if [ "$INSTALL_XDEBUG" = "1" ]; then \
    pecl install xdebug && docker-php-ext-enable xdebug; \
    fi

# (Optional) remove build deps to slim image; comment out if you plan to pecl-install more later
RUN apk del --no-network $PHPIZE_DEPS || true

# --- Tailwind CLI (standalone; musl build for Alpine) ---
ARG TAILWIND_URL="https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64-musl"
RUN curl -fsSL -o /usr/local/bin/tailwindcss "$TAILWIND_URL" \
    && chmod +x /usr/local/bin/tailwindcss \
    && /usr/local/bin/tailwindcss --help >/dev/null 2>&1

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Dev php.ini tweaks
RUN { \
    echo "memory_limit=512M"; \
    echo "upload_max_filesize=20M"; \
    echo "post_max_size=20M"; \
    echo "opcache.enable=0"; \
    echo "opcache.validate_timestamps=1"; \
    } > /usr/local/etc/php/conf.d/zz-dev.ini

WORKDIR /var/www/html
