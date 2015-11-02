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
                addItem(document.getElementById('newItem').value);
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
function addItem(item) {

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
            document.getElementById(entry.id).innerHTML = "<span>" +
                "<input type='button' onclick='javascript:deleteItem("+entry.id+")' value='Delete'>" +
                "<input type='button' onclick='javascript:editItem("+entry.id+")' value='Edit'>" +
                "<br/>" +
                "<b id='item"+entry.id+"'>"+item+"</b></span>" +
                "<div id='editModal-"+entry.id+"' title='Edit item' style='display: none;'>" +
                    "<textarea name='item' id='editModalTextArea-"+entry.id+"'>"+item+"</textarea>" +
                "</div>";

        }
    });
}
function editItem(textid) {

    $( "#editModal-"+textid ).dialog({
        modal: true,
        buttons: {
            "Edit item": function() {
                var url = 'edit-item';
                var text = document.getElementById('editModalTextArea-'+textid).value;

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {id: textid, text: text},
                    success: function () {
                        //edited , now update tex
                        document.getElementById('item'+textid).innerHTML = text;

                    }
                });
                $( this ).dialog( "close" );
            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        }

    });
}
//Delete an item
function deleteItem(id) {
    var url = "delete-item";

    if (confirm("You will delete an item. Continue?")) {
        $.ajax({
            type: 'POST',
            url: url,
            data: {id: id},
            success: function () {
                // Deleted..
                var elem = document.getElementById(id);
                elem.parentNode.removeChild(elem);
            }
        });
    }
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