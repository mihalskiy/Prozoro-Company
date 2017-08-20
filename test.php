
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="resource/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
$('#example').dataTable( {
 "aProcessing": true,
 "aServerSide": true,
"ajax": "index.php",
} );
} );

</script>
</head>

<body class="dt-example">
<table id="example" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>First name</th>
<th>Email</th>
<th>Mobile</th>
</tr>
</thead>
</table>


</body>
</html>