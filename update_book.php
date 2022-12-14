<?php
	include 'cek_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php
	include 'conn.php';
	$id = $_GET['id'];
	$data = mysqli_query($mysqli_connect,"select * from book where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<div class="container">
			<h1>Update Book</h1>
			<form method="post" action="update_function.php">
				<table class="table">
					<tr>			
						<td>Tittle</td>
						<td>
							<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
							<input type="text" name="tittle" class="form-control" value="<?php echo $d['tittle']; ?>">
						</td>
					</tr>
					<tr>
						<td>Author</td>
						<td><input type="text" name="author" class="form-control" value="<?php echo $d['author']; ?>"></td>
					</tr>
					<tr>
						<td>Price/Day</td>
						<td><input type="text" name="price" class="form-control" value="<?php echo $d['price_per_day']; ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-primary btn-lg">SAVE</button></td>
					</tr>		
				</table>
			</form>
		</div>
		<?php 
	}
	?>
</body>
<script>
	
</script>
</html>