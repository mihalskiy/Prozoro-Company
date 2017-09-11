<?php 
include('header.php');
include_once("db_connect.php");
?>
<title>phpzag.com : Demo Pagination with PHP, MySQL and jQuery</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery_pagination.js"></script>
<link rel='stylesheet' href='style.css' type='text/css' />
<?php include('container.php');?>
<div class="container">
<h2>Demo - Pagination with PHP, MySQL and jQuery</h2>
	<?php
	$per_page = 5;
	//Calculating no of pages
	$sql = "SELECT id, employee_name, employee_salary, employee_age FROM employee";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	$pages = ceil($count/$per_page)
	?>			
	
	<div id="content"></div>
	<div id="pagination">
		<ul class="pagination">
		<?php
		//Pagination Numbers
		for($i=1; $i<=$pages; $i++)
		{
			echo '<li id="'.$i.'">'.$i.'</li>';
		}
		?>
		</ul>
	</div>			
	<div class="botoom_link">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/pagination-with-jquery-mysql-and-php/" title="Pagination with PHP, MySQL and jQuery">Back to Tutorial</a>		
	</div>			
</div>
<?php include('footer.php');?>

