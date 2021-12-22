$(document).ready(function(){
	var product="";
	$("#save").click(function(){
		var name=$("#name").get(0).value;
		var category=$("#category").get(0).value;
		var unit=$("#unit").get(0).value;
		var reorder=$("#reorder").get(0).value;
		var quantity=$("#quantity").get(0).value;
		$.post("http://www.localhost/POS-System-Farmers/src/ui/public/user/public3/employeesalepostName",
		JSON.stringify({
			name: name,
			category: category,
			unit: unit,
			reorder: reorder,
			quantity: quantity
		}),
		function(data,status){
			alert("Data: " + data + "\nStatus: " + status);
		});
	});

	 $("#display").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/user/public3/employeesalespostPrint",
			function(data, status){
					var json=JSON.parse(data);
					var row="";
					for(var i=0;i<json.data.length;i++){
							row=row+"<tr><td>"+json.data[i].product+
			"</td><td>"+json.data[i].name+
			"</td><td>"+json.data[i].category+
			"</td><td>"+json.data[i].unit+
			"</td><td>"+json.data[i].reorder+
			"</td><td>"+json.data[i].quantity+
			"</td></tr>";
					}
					$("#data").get(0).innerHTML=row;
			});
	});

});
