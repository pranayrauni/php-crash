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

