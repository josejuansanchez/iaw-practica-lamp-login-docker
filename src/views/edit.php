<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
<br/><br/>

<form action="edit.php" method="post">

	<div class="mb-3">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" value="<?php echo $producto['name'];?>">
	</div>

	<div class="mb-3">
		<label for="qty">Quantity</label>
		<input type="number" class="form-control" name="qty" value="<?php echo $producto['qty'];?>">
	</div>

	<div class="mb-3">
		<label for="price">Price</label>
		<input type="number" class="form-control" name="price" value="<?php echo $producto['price'];?>">
	</div>

	<input type="hidden" name="id" value=<?php echo $producto['id'];?>>
	
	<div class="mb-3">
		<input type="submit" value="Update" class="form-control" >
	</div>
</form>