success:function(entrys) {
entrys.forEach(function(entry) {
var mainUL = document.getElementById("sortable");
var innerLI = document.createElement("li");
innerLI.setAttribute("id", entry.id);
mainUL.appendChild(innerLI);
document.getElementById(entry.id).innerHTML = "<span><input type='button' onclick='javascript:deleteEntry("+entry.id+")' value='Delete'><br/><b>"+entry.title+"</b></span>";
});
}


entrys.forEach(function(entry) {
var mainUL = document.getElementById("sortable");
var innerLI = document.createElement("li");
innerLI.setAttribute("id", entry.id);
mainUL.appendChild(innerLI);
document.getElementById(entry.id).innerHTML = "<span><input type='button' onclick='javascript:deleteEntry("+entry.id+")' value='Delete'><br/><b>"+entry.title+"</b></span>";
});
