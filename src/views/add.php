<ul class="nav nav-tabs">
	<li class="nav-item"><a href="index.php" class="nav-link" >Home</a></li>
	<li class="nav-item "><a href="view.php" class="nav-link">View</a></li>	
	<li class="nav-item"><a href="add.php" class="nav-link active">Add</a></li>
	<li class="nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>
</ul>
<br/>

<form action="add.php" method="post" enctype="multipart/form-data">
	<div class="mb-3">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" required>
	</div>

	<div class="mb-3">
		<label for="description">Description</label>
		<textarea class="form-control" rows="3" name="description"></textarea>
	</div>

	<div class="mb-3">
		<label for="qty">Quantity</label>
		<input type="number" class="form-control" name="qty" required>
	</div>

	<div class="mb-3">
		<label for="price">Price</label>
		<input type="number" class="form-control" name="price" required>
	</div>

	<div class="mb-3">
  		<label for="image" class="form-label">Product Image</label>
  		<input type="file" accept=".png, .jpg, .jpeg" class="form-control"  name="image">
	</div>

	<div class="mb-3">
		<input type="submit" value="Add" class="form-control btn btn-primary">
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