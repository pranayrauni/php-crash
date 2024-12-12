<?php




// there are two ways to connect to database - pdo and mysqlI. 
// pdo is more powerful and it supports more databases and object oriented.

$pdo = new PDO('mysql:host=localhost;port=3307;dbname=product_crud', 'root', '');
// first is dsn string which defines the connection string of database.

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // this is for throwing eception on getting error

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
    echo "ji";
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
  <h1>Create new Product</h1>


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