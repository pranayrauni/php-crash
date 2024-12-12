<?php

/** @var $pdo \PDO */

require_once "database.php";
require_once "functions.php";



$id = $_GET['id'] ?? null;

if(!$id) {
    header('Location: index.php');
    exit;
}


$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);



// for validation
$errors = [];
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];


// getting info from post 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {     // if lgane se  hua ki jab form fill ho tab hi add ho database m warna ek baar form fill karne k baaad refresh karne pe database m baar baar add ho rha tha
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  


  // form validation


  if (!$title) {
    $errors[] = 'Product title is required';
  }

  if (!$price) {
    
    $errors[] = 'Products price is required.';
    
  }


  if(!is_dir('images')){
    mkdir('images');
    echo "ji";
  }


  if (empty($errors)) {

    // image uploading
    $image = $_FILES['image'] ?? null;    // agar image upload nhi hai to null
    
    $imagePath = $product['image'];

    
    
    if($image && $image['temp_name']) {
      

    if($product['image']) {
        unlink($product['image']);
    }

      $imagePath = 'images/'.randomString(8).'/'.$image['name'];

      mkdir(dirname($imagePath));
      

      move_uploaded_file($image['tmp_name'], $imagePath);
      

    }
    



    // // inserting into database
    // // donot use exec here it will directly execute and which is harmful if one inserts sql injection in the form. use named variable.
    $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");

    $statement->bindValue(':title', $title);    // title named parameter has that value in varibale title. 
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    
    $statement->execute();

    header('Location: index.php');           // redirecting to index after adding product
  }
}




?>



<?php include_once "views/partials/header.php"; ?>

<p>
    <a href="index.php" class="btn btn-secondary">Back to products</a>
</p>
  <h1>Update Product</h1>


  <?php include_once "views/products/form.php" ?>


</body>

</html>