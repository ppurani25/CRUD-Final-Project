<?php  include('server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$email = $n['email'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	

    
    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

    
	<form method="post" action="server.php" >
	    <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                    <?php else: ?>
	            <button id='button1' class="btn" type="submit" name="save" onclick="revealmessage()">Save</button>
                    <?php endif ?>
                 <p id="hiddenmessage" style="display:none">THANK YOU!</p>
		</div>
	</form>
		<script src="javascripts.js"></script>
</body>

<body style="background-color:#ff9999;">
      <center>
         <img src="http://forensics.umn.edu/sites/g/files/pua1681/f/lite/m.jpg" border="0px" 
               width="400px" height="235px" >
      </center>

</html>
