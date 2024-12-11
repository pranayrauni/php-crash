<?php




$pdo = new PDO('mysql:host=localhost;port=3307;dbname=product_crud', 'root', '');
// first is dsn string which defines the connection string of database.

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // this is for throwing eception on getting error


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


function randomString($n) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  for($i = 0; $i<$n; $i++){
    $index = rand(0, strlen($characters) - 1);
    $str .= $characters[$index];
  }

  return $str;
}


?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="app.css">
</head>

<body>

<p>
    <a href="index.php" class="btn btn-secondary">Back to products</a>
</p>
  <h1>Update Product</h1>


  <?php if (!empty($errors)):  ?>

  

    <div class="alert alert-danger">

      <?php foreach ($errors as $error): ?>

        <div><?php echo $error ?></div>

      <?php endforeach; ?>


    </div>

  <?php endif; ?>


  <!--  -->
  <form action="" method="post" enctype="multipart/form-data">
    <!-- action - where form should ne submittede. in this case on thus ame file, create.php . 
  if we want same file to be submitted then leave "action empty.
  
  method(get, post) - update or delete should be done using these methods.
  if you dont provide method attribute it is "get". 

  whenever we submit form, it takes names of input fields which can be seen in the url on submitting form. this is called query string in the url.


  when we submit form using get method then data is visible in url query string separated by & statement.
  Do not use get method when passing sensitive information. get mehtod is suitable in case of search.


  there are superglobals in php which starts with $ and underscore. example $_GET, $_COOKIE


  enctype attribute is for submitting files.

-->

        <?php 
        
        if($product['image']): ?>        
        
            <img src="<?php echo $product['image'] ?>" alt="">
        <?php endif; ?>


    <div class="mb-3">
      <label class="form-label">Product Image</label>
      <br>
      <input type="file" name="image"> <!-- here name will act as key of the file-->
    </div>

    <div class="mb-3">
      <label class="form-label">Product Title</label>
      <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Product Description</label>
      <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Product Price</label>
      <input type="number" step="0.01" name="price" value="<?php echo $price ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>




</body>

</html>