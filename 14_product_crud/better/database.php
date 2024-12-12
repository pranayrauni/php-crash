<?php 

$pdo = new PDO('mysql:host=localhost;port=3307;dbname=product_crud', 'root', '');
// first is dsn string which defines the connection string of database.

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // this is for throwing eception on getting error






?>