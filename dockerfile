# PHP 8.1 serveridan foydalanamiz
FROM php:8.1-cli

# Ishchi katalogni yaratamiz
WORKDIR /app

# Loyihani konteyner ichiga nusxalash
COPY . .

# Portni ochamiz
EXPOSE 8080

# Skriptni ishga tushiramiz
CMD ["sh", "start.sh"]