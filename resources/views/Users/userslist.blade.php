<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
label{
    color: black;
    font-size:1vw
}
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>

</head>
<body>
	{{-- @include('sweetalert::alert') --}}
    @include('Navigation')


<div class="container-fluid">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage Employees</h2>
					</div>
					<div class="col-sm-6">
						<a href="{{url("/add_user")}}" class="btn btn-info"><i class="material-icons">&#xE147;</i> <span>Add User</span></a>
					</div>


				</div>
			</div>
			{{-- <div style="display:flex" class="col-md-12">
				<div class="form-row col-sm-12">
					<div class="form-group ml-2" style="width:15%;">
						<label for="fromdate">Employee Name</label>
						<select type="dropdown" class="form-control select2" id ="empname" >
							<option value="0">--Name--</option>
							@foreach($employeename as $key_name => $name)
								<option value = "{{$name}}">{{$name}}</option>
							@endforeach
						</select>
					</div>
				<div class="form-group ml-2" style="width:15%;">
						<label for="taskstageid">Designation</label>
						<select type="dropdown" class="form-control select2" id ="designation" >
							<option value="0">--Designation--</option>
							@foreach($uniquedesignation as $key => $itype)
								<option value = "{{$itype}}">{{$itype}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group ml-2" style="width:15%;">
						<label for="fromdate">Date of joining</label>
						<input type="date" name="date" class="form-control" id="doj">
						@if ($errors->has('date')) <p style="color:red;">{{ $errors->first('date') }}</p> @endif
					</div>

					&nbsp;&nbsp;&nbsp;
					<div class="form-group ml-1" style="width:15%;">
						<label for="fromdate">From date</label>
						<input type="date" name="date" class="form-control" id="fromdate">
						@if ($errors->has('date')) <p style="color:red;">{{ $errors->first('date') }}</p> @endif
					</div>
					&nbsp;&nbsp;&nbsp;
					<div class="form-group ml-1" style="width:15%;">
						<label for="todate">To date</label>
						<input type="date" name="date" class="form-control" id="todate">
						@if ($errors->has('date')) <p style="color:red;">{{ $errors->first('date') }}</p> @endif
					</div>
					&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-warning form-control btns col-sm-1 ml-1" style="margin-top:30px;" id="bapply" onclick="filterProduct()">Apply</button>

						&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-info form-control col-sm-1 btns ml-1" style="margin-top:30px;" id="bclear" onclick="clearFilter()">Clear</button><span class="text-danger" style="margin-left:34%" id="errorDate"></span>
				</div>
		    </div> --}}
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Index</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if ($users)
						@foreach ($users as $index => $user)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ $user['name'] }}</td>
								<td>{{ $user['email'] }}</td>
								<td>{{ $user['role'] }}</td>
								</td>
								<td>
									<a href="{{ url('/edit_user/' . $user['id']) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									@if ($user['deleted_at'] == null)
										<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									@else
										<a href="{{ url('/restore_user/' . $user['id']) }}" class="restore"><i class="material-icons" data-toggle="tooltip" title="Restore">&#x21bb;</i></a>
									@endif
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="9">Record Not Found...</td>
						</tr>
					@endif
				</tbody>
			</table>

			{{ $users->appends($data)->onEachSide(0)->links() }}
		</div>
	</div>        
</div>


<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			{{-- @if(isset($employee)) --}}
				<form id="brokersform" action="{{ url('/delete_user/' . $user['id']) }}" method='POST' autocomplete='off' enctype="multipart/form-data">
			{{-- @else --}}
			{{-- @endif --}}
				{{csrf_field() }}
				<div class="modal-header">
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this user?</p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="importModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="importform" action="{{url('/import_employee_data_sheet')}}" method='POST' autocomplete='off' enctype="multipart/form-data">
				{{csrf_field() }}
					<div class="modal-header">
						<h4 class="modal-title">Add employee via excel</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<label>Upload Employee Sheet<span style="color:red;">*</span>&nbsp;</label>
						<div class="col-md-12">
						  <input type="file" class="form-control" id="empsheet" name='empsheet'/>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Submit">
					</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script>
	function filterProduct(){
		let fromdate = document.getElementById('fromdate').value;
		let todate = document.getElementById('todate').value;
		let empname = document.getElementById('empname').value;
		let designation = document.getElementById('designation').value;
		let doj = document.getElementById('doj').value;


        let stringUrl = window.location.href;
		let url = new URL(stringUrl);
		let params = url.searchParams;
		params.append("designation", designation);
		params.append("doj", doj);
		params.append("empname", empname);
		params.append("fromdate", fromdate);
		params.append("todate", todate);

    	if(fromdate && todate){
            if(fromdate>todate){
            document.getElementById('errorDate').innerHTML = "Invalid Date Range!";
            return;
			}
        }
		if(doj && todate){
            if(doj>todate){
            document.getElementById('errorDate').innerHTML = "Invalid Date Range!";
            return;
			}
        }
		if(doj && fromdate){
            if(doj>fromdate){
            document.getElementById('errorDate').innerHTML = "Invalid Date Range!";
            return;
        }
        else{
            document.getElementById('errorDate').innerHTML = "";
            }
        }
        document.location.href= url;
	}

	function clearFilter(){
		document.getElementById("fromdate").value ="";
		document.getElementById("todate").value ="";
		document.getElementById("doj").value ="";
		document.getElementById("empname").value ="0";
		document.getElementById("designation").value ="0";
		document.getElementById("errorDate").innerHTML ="";
        window.location.href = '{{url('/employee_list')}}';
	}
</script>