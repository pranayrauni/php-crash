<?php 

$pdo = new PDO('mysql:host=localhost;port=3307;dbname=product_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // this is for throwing eception on getting error


$id = $_POST['id'] ?? null;

if(!$id) {
    header('Location: index.php');
    exit;
}

// echo '<pre>';
// var_dump($id);
// echo '</pre>';

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');

?>