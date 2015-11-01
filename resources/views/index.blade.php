<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Test project (draggable fields)</title>
	
	<!-- Load  CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body>

	<div class="container">
		<div class="content">
			<input type="button" onclick="javascript:openAddNew()" value="Add">
			<ul id="sortable">
				@foreach ($items as $item)
					<li id="{{$item->id}}">
						<span>
							<input type='button' onclick='javascript:deleteItem({{$item->id}})' value='Delete'>
							<br/>
							<b>{{$item->title}}</b>
						</span>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div id="addNew" title="Enter new item" style="display: none;">
		<textarea name="item" id="newItem"></textarea>
	</div>
</body>
<!-- JS Script Part -->
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>