<?php




// there are two ways to connect to database - pdo and mysqlI. 
// pdo is more powerful and it supports more databases and object oriented.

/** @var $pdo \PDO */

require_once "database.php";
require_once "functions.php";

// now make query to database and select all the products. we can do this using prepare. exec can also do this but is recommended in case of making changes in schema

// echo '<pre>';
// var_dump($_POST);
// var_dump($_SERVER);   // superglobal server gives many things like REQUEST_METHOD, SERVER_PORT, SERVER_NAME, ETC.
// var_dump($_FILES);
// echo '</pre>';
// exit;
// echo $_SERVER['REQUEST_METHOD'] . '<br>';



// image - on uploading a new file, apache saves this in temperory directory. to save it, make a request save the file somewhere else to store. also put location of file in database to render on  nedded. 





// for validation
$errors = [];
$title = '';
$price = '';
$description = '';
$Product = [
  'image' => ''
];


// getting info from post 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {     // if lgane se  hua ki jab form fill ho tab hi add ho database m warna ek baar form fill karne k baaad refresh karne pe database m baar baar add ho rha tha
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $date = date('Y-m-d H:i:s');


  // form validation


  if (!$title) {
    $errors[] = 'Product title is required';
  }

  if (!$price) {
    
    $errors[] = 'Products price is required.';
    
  }


  if(!is_dir('images')){
    mkdir('images');
    
  }


  if (empty($errors)) {

    // image uploading
    $image = $_FILES['image'] ?? null;    // agar image upload nhi hai to null
    
    $imagePath = '';

    
    
    if($image && $image['temp_name']) {
      

      $imagePath = 'images/'.randomString(8).'/'.$image['name'];

      mkdir(dirname($imagePath));
      

      move_uploaded_file($image['tmp_name'], $imagePath);
      

    }
    



    // // inserting into database
    // // donot use exec here it will directly execute and which is harmful if one inserts sql injection in the form. use named variable.
    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                    VALUES (:title, :image, :description, :price, :date)");

    $statement->bindValue(':title', $title);    // title named parameter has that value in varibale title. 
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', $date);
    $statement->execute();

    header('Location: index.php');           // redirecting to index after adding product
  }
}





?>



<?php include_once "views/partials/header.php"; ?>

<p>
    <a href="index.php" class="btn btn-secondary">Back to products</a>
</p>

  <h1>Create new Product</h1>


  

  
    <?php include_once "views/products/form.php" ?>

    


</body>

</html>