<?php

//PHP Grid database connection settings, Only need to update these in new project

define("PHPGRID_DBTYPE","mysqli"); // mysql,oci8(for oracle),mssql,postgres,sybase
define("PHPGRID_DBHOST","localhost");
define("PHPGRID_DBUSER","root");
define("PHPGRID_DBPASS","");
define("PHPGRID_DBNAME","prozoro");
define('PHPGRID_DB_CHARSET','utf8');

// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);


// ** MySQL settings ** //
//define('DB_NAME', 'northwind');    // The name of the database
//define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
// define('DB_DSN','mysql:host=localhost;dbname=northwind');
// define('DB_USER', 'root');     // Your MySQL username
// define('DB_PASSWORD', ''); // ...and password
// define('DB_DATABASE', 'myoffice'); // ...and password

// define('ABSPATH', '../../../../');
// // Form settings
// $SERVER_HOST = "";        // the host name
// $SELF_PATH = "";    // the web path to the project without http
// $CODE_PATH = "../../../../php/PHPSuito/"; // the physical path to the php files


?>
