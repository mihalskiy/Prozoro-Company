<html>
	<head>
		<title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%" style="background:#d9edf7;">№</th>
							<th width="35%" style="background:#d9edf7;">Сайт</th>
							<th  width="10%" style="background:#d9edf7;">Форма проведення закупівлі</th>
							<th width="10%" style="background:#d9edf7;">Адреса об'єкту</th>
							<th style="background:#d9edf7;">Види робіт</th>
							<th  width="10%" style="background:#d9edf7;">Замовник</th>
							<th style="background:#d9edf7;">Вартість робіт по оголошенню, тис.грн.</th>
							<th  width="10%" style="background:#d9edf7;">Наша вхідна ціна, тис.грн</th>
							<th  width="10%" style="background:#d9edf7;">Банківська гарантія тендерної пропозиції</th>
							<th style="background:#d9edf7;">Банківська гарантія виконання дговору</th>
                            <th style="background:#d9edf7;">Дата початку прийому пропозицій</th>
							<th style="background:#d9edf7;">Дата завершення прийому пропозицій</th>
							<th style="background:#d9edf7;">Дата аукціону</th>
							<th style="background:#d9edf7;">Результати аукціону</th>
							<th style="background:#d9edf7;">Сума перемоги тис.грн</th>
							<th style="background:#d9edf7;">Результати аукціону після кваліфікації</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">
					<label>Сайт</label>
					<input type="text" name="secretarySite" id="secretarySite" class="form-control" />

					<label>Форма проведення закупівлі</label>
					<input type="text" name="secretaryForm" id="secretaryForm" class="form-control" />
					<label>Адреса об'єкту</label>
					<input type="text" name="secretaryAddres" id="secretaryAddres" class="form-control" />
			
					<label>Види робіт</label>
					<input type="text" name="secretaryWork" id="secretaryWork" class="form-control" />
					<label>Замовник</label>
					<input type="text" name="secretaryCustomer" id="secretaryCustomer" class="form-control" />
					<label>Вартість робіт по оголошенню, тис.грн.</label>
					<input type="text" name="secretaryInputPrice" id="secretaryInputPrice" class="form-control" />
					<label>Наша вхідна ціна, тис.грн</label>
					<input type="text" name="secretaryBank" id="secretaryBank" class="form-control" />
					<label>Банківська гарантія тендерної пропозиції</label>
					<input type="text" name="secretaryBankWork" id="secretaryBankWork" class="form-control" />
					<label>Банківська гарантія виконання дговору</label>
					<input type="text" name="secretaryDateStart" id="secretaryDateStart" class="form-control" />
					<label>Дата початку прийому пропозицій</label>
					<input type="date" name="secretaryDateOver" id="secretaryDateOver" class="form-control" />
					<label>Дата завершення прийому пропозицій</label>
					<input type="date" name="secretaryDateAuction" id="secretaryDateAuction" class="form-control" />
					<label>Дата аукціону</label>
					<input type="date" name="secretaryResultAction" id="secretaryResultAction" class="form-control" />
					<label>Результати аукціону</label>
					<input type="text" name="secretarySumWinner" id="secretarySumWinner" class="form-control" />
					<label>Сума перемоги тис.грн</label>
					<input type="text" name="secretaryResultActionAbout" id="secretaryResultActionAbout" class="form-control" />
					<label>Результати аукціону після кваліфікації</label>
					<input type="text" name="secretaryTimerDay" id="secretaryTimerDay" class="form-control" />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Додати запис");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var secretarySite = $('#secretarySite').val();
		var secretaryForm = $('#secretaryForm').val();
		var secretaryAddres = $('#secretaryAddres').val();
		var secretaryWork = $('#secretaryWork').val();
		var secretaryCustomer = $('#secretaryCustomer').val();
		var secretaryInputPrice = $('#secretaryInputPrice').val();
		var secretaryBank = $('#secretaryBank').val();
		var secretaryBankWork = $('#secretaryBankWork').val();
		var secretaryDateStart = $('#secretaryDateStart').val();
		var secretaryDateOver = $('#secretaryDateOver').val();
		var secretaryDateAuction = $('#secretaryDateAuction').val();
		var secretaryResultAction = $('#secretaryResultAction').val();
		var secretaryResultActionAbout = $('#secretaryResultActionAbout').val();
		var secretaryTimerDay = $('#secretaryTimerDay').val();
		// if(extension != '')
		// {
		// 	if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
		// 	{
		// 		alert("Invalid Image File");
		// 		$('#user_image').val('');
		// 		return false;
		// 	}
		// }	
		if(secretarySite != '' && secretaryForm != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Маша заповни перші 2 колонки.");
		}
	});
	
	$(document).on('click', '.update', function(){
		var id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#secretarySite').val(data.secretarySite);
				$('#secretaryForm').val(data.secretaryForm);
				$('#secretaryAddres').val(data.secretaryAddres);
				$('#secretaryWork').val(data.secretaryWork);
				$('#secretaryCustomer').val(data.secretaryCustomer);
				$('#secretaryInputPrice').val(data.secretaryInputPrice);
				$('#secretaryBank').val(data.secretaryBank);
				$('#secretaryBankWork').val(data.secretaryBankWork);
				$('#secretaryDateStart').val(data.secretaryDateStart);
				$('#secretaryDateOver').val(data.secretaryDateOver);
				$('#secretaryDateAuction').val(data.secretaryDateAuction);
				$('#secretaryResultAction').val(data.secretaryResultAction);
				$('#secretarySumWinner').val(data.secretarySumWinner);
				$('#secretaryResultActionAbout').val(data.secretaryResultActionAbout);
				$('#secretaryTimerDay').val(data.secretaryTimerDay);
				$('.modal-title').text("Редагувати запис");
				$('#id').val(id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Ви впевнені що потрібно видалити саме це?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>