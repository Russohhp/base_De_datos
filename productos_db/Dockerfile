# Usar la versión 8.0 de MySQL
FROM mysql:8.0

# Definir variables de entorno para la base de datos
ENV MYSQL_ROOT_PASSWORD="your-root-password"
ENV MYSQL_DATABASE="productos_db"
ENV MYSQL_USER="root"
ENV MYSQL_PASSWORD="your-password"

# Exponer el puerto 3306 para conexiones MySQL
EXPOSE 3306

# Comando para iniciar MySQL
CMD ["mysqld"]
