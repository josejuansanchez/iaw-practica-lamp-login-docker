<ul class="nav nav-tabs">
	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	<li class="nav-item "><a href="" class="nav-link active">Edit</a></li>
	<li class="nav-item "><a href="view.php" class="nav-link">View</a></li>	
	<li class="nav-item"><a href="add.php" class="nav-link">Add</a></li>
	<li class="nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>
</ul>
<br/>

<form action="edit.php" method="post" enctype="multipart/form-data">
	<div class="mb-3">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" value="<?php echo $producto['name'];?>">
	</div>

	<div class="mb-3">
		<label for="description">Description</label>
		<textarea class="form-control" rows="3" name="description"><?php echo $producto['description'];?></textarea>
	</div>

	<div class="mb-3">
		<label for="qty">Quantity</label>
		<input type="number" class="form-control" name="qty" value="<?php echo $producto['qty'];?>">
	</div>

	<div class="mb-3">
		<label for="price">Price</label>
		<input type="number" class="form-control" name="price" value="<?php echo $producto['price'];?>">
	</div>

	<div class="mb-3">
  		<label for="image" class="form-label">Product Image</label>
  		<input type="file" accept=".png, .jpg, .jpeg" class="form-control"  name="image">
	</div>

	<input type="hidden" name="image_name" value=<?php echo $producto['image_name'];?>>
	<input type="hidden" name="id" value=<?php echo $producto['id'];?>>
	
	<div class="mb-3">
		<input type="submit" value="Update" class="form-control btn btn-primary">
	</div>
</form>

<?php if ($status == "error") : ?>
<div class="alert alert-danger" role="alert">
    <?php echo $message; ?>
</div>
<?php endif; ?>

<?php if ($status == "success") : ?>
<div class="alert alert-success" role="alert">
	<?php echo $message; ?>
</div>
<?php endif; ?>