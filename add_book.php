<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>form input</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
	<div class="container">
		<h1>ADD BOOK</h1>
		<table class="table">
			<form method="post" action="add_function.php">
				<table class="table">
					<tr>
						<td>Tittle</td>
						<td><input type="text" name="tittle" class="form-control" placeholder="Book Title"></td>
					</tr>
					<tr>
						<td>Author</td>
						<td><input type="text" name="author" class="form-control" placeholder="Author"></td>
					</tr>
					<tr>
						<td>Price Per Day</td>
						<td><input type="number" name="price" class="form-control" placeholder="Price"></td>
					</tr>
					<tr>
						<td colspan="2"> <button type="submit" class="btn btn-primary btn-lg">SAVE</button></td>
					</tr>
				</table>
			</form>
		</table>
	</div>

</body>

</html>