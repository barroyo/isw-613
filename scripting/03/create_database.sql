-- Comandos para crear usuario y base de datos desde terminal MySQL
CREATE USER 'php_web2'@'localhost' IDENTIFIED BY 'php_web2';
CREATE DATABASE php_web2;
GRANT ALL PRIVILEGES ON php_web2.* TO 'php_web2'@'localhost';
FLUSH PRIVILEGES;
