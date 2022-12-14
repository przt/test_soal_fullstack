<?php
include 'cek_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://releases.jquery.com/git/jquery-3.x-git.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
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
			<div class="col">
				<button type="button" onclick="location.href='add_loan.php'" class="btn btn-primary">Add</button>
				<button type="button" onclick="location.href='export_xls.php'" class="btn btn-success">Report XLS</button>
				<button type="button" onclick="location.href='export_pdf.php'" class="btn btn-danger">Report PDF</button>
			</div>
		</div>
		<br>

		<div class="row">

			<table class="table" id="book_tb">
				<thead class="thead-dark">
					<tr>
						<td>No</td>
						<td>Name</td>
						<td>Private Number</td>
						<td>E-Mail</td>
						<td>Date</td>
						<td>Book</td>
						<td>Day</td>
						<td>Sub Total</td>
						<td>action</td>
					</tr>
				</thead>
				<?php
				include 'conn.php';
				$no = 1;
				$data = mysqli_query($mysqli_connect, "select * from loan");
				while ($d = mysqli_fetch_array($data)) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['name']; ?></td>
						<td><?php echo $d['private_number']; ?></td>
						<td><?php echo $d['email']; ?></td>
						<td><?php echo $d['date']; ?></td>
						<td><?php echo $d['id_book']; ?></td>
						<td><?php echo $d['day_total']; ?></td>
						<td><?php echo $d['price']; ?></td>
						<td>
							<a href="update_loan.php?id=<?php echo $d['id']; ?>">EDIT</a>
							<a href="d_loan.php?id=<?php echo $d['id']; ?>">DELETE</a>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</body>

<script>
	$(document).ready(function() {
		$('#book_tb').DataTable();
	});
</script>

</html>