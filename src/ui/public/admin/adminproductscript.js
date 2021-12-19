$(document).ready(function(){
	var product="";
	$("#save").click(function(){
		var name=$("#name").get(0).value;
		var category=$("#category").get(0).value;
		var unit=$("#unit").get(0).value;
		var reorder=$("#reorder").get(0).value;
		$.post("http://www.localhost/POS-System-Farmers/src/ui/public/admin/public/adminproductpostName",
		JSON.stringify({
			name: name,
			category: category,
			unit: unit,
			reorder: reorder
		}),
		function(data,status){
			alert("Data: " + data + "\nStatus: " + status);
		});
	});

	 $("#display").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/adminproductpostPrint",
			function(data, status){
					var json=JSON.parse(data);
					var row="";
					for(var i=0;i<json.data.length;i++){
							row=row+"<tr><td>"+json.data[i].product+
			"</td><td>"+json.data[i].name+
			"</td><td>"+json.data[i].category+
			"</td><td>"+json.data[i].unit+
			"</td><td>"+json.data[i].reorder+
			"</td></tr>";
					}
					$("#data").get(0).innerHTML=row;
			});
	});

	 $("#search").click(function(){
			product=prompt("code");
			//endpoint
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/adminsearchproduct",
			JSON.stringify(
					//payload
					{
							product:product
					}
			),
			function(data, status){
					//result
					var json=JSON.parse(data);
			$("#product").get(0).value=json.data[0].product;
			$("#name").get(0).value=json.data[0].name;
		$("#category").get(0).value=json.data[0].category;
		$("#unit").get(0).value=json.data[0].unit;
		$("#reorder").get(0).value=json.data[0].reorder;
					console.log(json);
			});
	});

$("#update").click(function(){
	var name=$("#name").get(0).value;
	var category=$("#category").get(0).value;
	var unit=$("#unit").get(0).value;
	var reorder=$("#reorder").get(0).value;
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/adminupdateproduct",
			JSON.stringify({
					product: product,
					name: name,
					category: category,
					unit: unit,
					reorder: reorder
			}),
			function(data, status){
					alert("Data: " + data + "\nStatus: " + status);
			});
	});

	$("#delete").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/admindeleteproduct",
			JSON.stringify({
					product:product
			}),
			function(data, status){
					alert("Data: " + data + "\nStatus: " + status);
			});
	});
});
