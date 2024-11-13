# Usa a imagem oficial do PHP para rodar o backend
FROM php:7.4-apache

# Copia o código PHP para o diretório padrão do Apache
COPY . /var/www/html

# Concede as permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Exponha a porta padrão do Apache
EXPOSE 80
