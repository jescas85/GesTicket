<?php
// COMENTAR LA QUE NO SE VALLA A USAR
/* CONEXION MySQLi */
/*const DRIVER="mysql"; // Tipo de conexion a la base de datos
const SERVER="localhost"; // Servidor de la base de datos
const DB="segurida_web"; // Nombre de la base de datos
const USER="segurida_sa"; // Usuario d ela base de  datos
const PASS="536ur1d4d"; // Contraseña e la base de datos
const PORT="3306"; // Puerto de la base de datos
const CHARSET="utf8"; // Definimos la codificación de los caracteres*/

/* CONEXION MySQLi */
const DRIVER="mysql"; // Tipo de conexion a la base de datos
const SERVER="localhost"; // Servidor de la base de datos
const DB="db_protege"; // Nombre de la base de datos
const USER="root"; // Usuario d ela base de  datos
const PASS=""; // Contraseña e la base de datos
const PORT="3306"; // Puerto de la base de datos
const CHARSET="utf8"; // Definimos la codificación de los caracteres

/* CONEXION Mssql */
/* const DRIVER="sqlsrv";
const SERVER="127.0.0.1";
const DB="Impulsora";
const USER="sa";
const PASS="sqlAdmin2012";
const PORT="1433";
const CHARSET="UTF-8"; */

#define('DB_LOG_PATCH', 'https://' . $_SERVER['HTTP_HOST'] . '/core/logs/DB_ERRORS.txt');
define('DB_LOG_PATCH', 'D:/Desarrollo/laragon/www/web_protege/core/logs/DB_ERRORS.txt');