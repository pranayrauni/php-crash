<?php

// there are two ways to connect to database - pdo and mysqlI. 
// pdo is more powerful and it supports more databases and object oriented.

/** @var $pdo \PDO */

require_once "database.php";
// now make query to database and select all the products. we can do this using prepare. exec can also do this but is recommended in case of making changes in schema

$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
  $statement->bindValue(':title', "%$search%");
} else {
  $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
  
}

// $statement is instance of pdo statement. on this statement we can call execute which will amke query in the database.
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);    // each record will fetched in associative array.

// echo '<pre';
var_dump($products);
// echo '</pre>';


?>


<?php include_once "views/partials/header.php"; ?>


  <h1>Products CRUD</h1>


  <p>
    <a href="create.php" class="btn btn-success">Create Product</a>
  </p>

  <form>

    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Seach for products" name="search" value="<?php echo $search ?>">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </form>



  <table class=" table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Craete Date</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $i => $product) { ?>

            <tr>
              <th scope="row"><?php echo $i + 1 ?></th>

              <td>
                <img src="<?php echo $product['image'] ?>" alt="no image found" class="thumb-image">
              </td>
              <td><?php echo $product['title'] ?></td>
              <td><?php echo $product['price'] ?></td>
              <td><?php echo $product['create_date'] ?></td>

              <td>
                <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>

                <form style="display: inline-block;" method="post" action="delete.php">
                  <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                </form>

              </td>
            </tr>

          <?php } ?>


          ?>
        </tbody>
        </table>
</body>

</html>