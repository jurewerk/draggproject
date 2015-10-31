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
							<input type='button' onclick='javascript:deleteEntry({{$item->id}})' value='Delete'>
							<input type='button' onclick='javascript:editEntry({{$item->id}})' value='Edit'>
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
<script>
	//Modal box for addnig new item
	function openAddNew() {
		$( "#addNew" ).dialog({
			modal: true,
			buttons: {
				"Add item": function() {
					addEntry(document.getElementById('newItem').value);
					document.getElementById('newItem').value = '';
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}

		});
	}
	//Add an item
	function addEntry(item) {

		var url = "add-item";
		$.ajax({
			type: 'POST',
			url: url,
			data: {entry: item},
			success: function (entry) {
				var ul = document.getElementById("sortable");
				var li = document.createElement("li");
				li.setAttribute("id", entry.id)
				ul.appendChild(li)
				document.getElementById(entry.id).innerHTML = "<span><input type='button' onclick='javascript:deleteEntry("+entry.id+")' value='Delete'><br/><b>"+item+"</b></span>";

			}
		});
	}
	//Delete an item
	function deleteEntry(id) {
		var url = "delete-item";
		$.ajax({
			type: 'POST',
			url: url,
			data: {id: id},
			success:function(data) {
				if (data) {
					var elem = document.getElementById(id);
					elem.parentNode.removeChild(elem);
				} else {
					// DO SOMETHING }
				}
			}
		});
	}
	//Sorting items
	$(function () {
		$('#sortable').sortable({
			update: function () {
				var url = "sort-items";
				var order = $(this).sortable('toArray').toString();
				// change order in the database using Ajax
				$.ajax({
					url: url,
					type: 'POST',
					data: {list_order: order},
					success: function (data) {
						//finished
					}
				});
			}
		});
	});
</script>
</html>