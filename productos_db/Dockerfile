# Usar la última versión oficial de MySQL
FROM mysql:latest  

# Definir variables de entorno para la base de datos
ENV MYSQL_ROOT_PASSWORD="hola123"  # Contraseña para el usuario root
ENV MYSQL_DATABASE="productos_db"  # Nombre de la base de datos que se creará

# Exponer el puerto 3306 para conexiones MySQL
EXPOSE 3306  

# Comando para iniciar MySQL
CMD ["mysqld"]

