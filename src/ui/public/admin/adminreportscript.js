$(document).ready(function(){

	// display report
	$.post("http://www.localhost/POS-System-Farmers/src/ui/public/admin/public5/adminreportsPost",
	function(data, status){
	var json=JSON.parse(data);
	var row="";
	for(var i=0;i<json.data.length;i++){
			row=row+"<tr><td>"+json.data[i].product+"</td><td>"+json.data[i].name+"</td><td>"+json.data[i].category+"</td><td>"+json.data[i].unit+"</td><td>"+json.data[i].reorder+"</td><td>"+json.data[i].quantity+"</td></tr>";}
			$("#data").get(0).innerHTML=row;
			console.log(JSON.parse(data));
	});

});
