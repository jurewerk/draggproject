/*
* Author : Jure Werk
* Email : jure.werk@gmail.com
* Website : http://www.pcandweb.si
* Subject : Dynamic Drag and Drop with jQuery and PHP
*/

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
                var elem = document.getElementById(id);
                elem.parentNode.removeChild(elem);
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