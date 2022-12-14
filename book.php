<?php
	include 'cek_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link active" href="book.php">Master Book</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="loan.php">Data Loan</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
		</li>
	</ul>

	<div class="container">
		<div class="row">
			<button type="button" onclick="location.href='add_book.php'" class="btn btn-primary">Add</button>
		</div>
		<br>
		<div class="row">
			<table class="table">
				<tr>
					<td>No</td>
					<td>tittle</td>
					<td>author</td>
					<td>Price/Day</td>
					<td>action</td>
				</tr>
				<?php
				include 'conn.php';
				$no = 1;
				$data = mysqli_query($mysqli_connect, "select * from book");
				while ($d = mysqli_fetch_array($data)) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['tittle']; ?></td>
						<td><?php echo $d['author']; ?></td>
						<td><?php echo $d['price_per_day']; ?></td>
						<td>
							<a href="update_book.php?id=<?php echo $d['id']; ?>">EDIT</a>
							<a href="d_book.php?id=<?php echo $d['id']; ?>">DELETE</a>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</body>

</html>