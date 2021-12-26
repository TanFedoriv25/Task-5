<?php
require "RedBeans/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=users', 'root', '' );
if(!R::testConnection()) die('No DB connection!');
session_start();
