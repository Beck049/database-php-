<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con); 

?> 

<!DOCTYPE html>
<html>
<head>
	<title>My database project</title>
	<link rel="stylesheet" href="tabs.css">
</head>
<body>
	<!-- login logout style -->
	<div>
		<h1>This is the index page</h1>
		<br>
		<?php
			if( $user_data == NULL ) {
				
				echo '<a href="login.php"  style = "float: right; padding: 6px;">Login </a>';
				echo '<a href="signup.php" style = "float: right; padding: 6px;">Signup</a>'; 
			}
			else {
				echo '<a style = "float: right; padding: 6px;">' . $user_data['user_name'] . '</a>';
				echo '<a href="logout.php" style = "float: right; padding: 6px;">Logout</a>';
			}
		?>
		<br> 
	</div>
	<br>
	<!-- nav bar tab -->
	<div class="tab">
		<button class="tablinks" onclick="openTab(event, 'Search')" id="defaultOpen">Search</button>
		<?php
		if($user_data != NULL) {
			$pos = $user_data['position'];
			if($pos % 2 == 1) {
				echo '<button class="tablinks" onclick="openTab(event, ' . "'Create'" . ')">Create</button>';
				echo '<button class="tablinks" onclick="openTab(event, ' . "'Modify'" . ')">Modify</button>';
			}
			if($pos / 4 % 2 == 1) {
				echo '<button class="tablinks" onclick="openTab(event, ' . "'Status'" . ')">Status</button>';
			}
			if($pos / 8 % 4 == 1) {
				echo '<button class="tablinks" onclick="openTab(event, ' . "'Analyze'" . ')">Analyze</button>';
			}
			if($pos / 16 % 8 == 1) {
				echo '<button class="tablinks" onclick="openTab(event, ' . "'Root'" . ')">Root</button>';
			}
		}
		?>
	</div>

	<div id="Search"  class="tabcontent">
		<h3>Search</h3>
		<iframe src="search.php" width="100%" ></iframe>
	</div>

	<div id="Create" class="tabcontent">
		<h3>Create Order</h3>
		
		<iframe src="create.php" width="100%" ></iframe>
	</div>

	<div id="Modify"  class="tabcontent">
		<h3>Modify</h3>
		<iframe src="modify.php" width="100%" ></iframe>
	</div>

	<div id="Status"  class="tabcontent">
		<h3>Status</h3>
		<iframe src="status.php" width="100%" ></iframe>
	</div>

	<div id="Analyze" class="tabcontent">
		<h3>Analyze</h3>
		<div></div>
	</div>

	<div id="Root"	class="tabcontent">
		<h3>Root</h3>
		<iframe src="root.php" width="100%" ></iframe>
	</div>

	<!-- script for tab -->
	<script>
		function openTab(evt, tabName) 
		{
		  var i, tabcontent, tablinks;
		  // hide all
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }
		  // remove all "active" class
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  // "active" the current tab 
		  // "display = block"
		  document.getElementById(tabName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
		
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>

</body>
</html>
