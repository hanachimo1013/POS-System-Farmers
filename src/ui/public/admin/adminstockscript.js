$(document).ready(function(){
	var pcode="";
	$("#save").click(function(){
		var name=$("#name").get(0).value;
		var caldate=$("#caldate").get(0).value;
		var addquan=$("#addquan").get(0).value;
		var prodes=$("#prodes").get(0).value;
		$.post("http://www.localhost/POS-System-Farmers/src/ui/public/admin/public3/adminstockpostName",
		JSON.stringify({
			name: name,
			caldate: caldate,
			addquan: addquan,
			prodes: prodes
		}),
		function(data,status){
			alert("Data: " + data + "\nStatus: " + status);
		});
	});

	 $("#display").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public3/adminstockpostPrint",
			function(data, status){
					var json=JSON.parse(data);
					var row="";
					for(var i=0;i<json.data.length;i++){
							row=row+"<tr><td>"+json.data[i].pcode+
			"</td><td>"+json.data[i].name+
			"</td><td>"+json.data[i].caldate+
			"</td><td>"+json.data[i].addquan+
			"</td><td>"+json.data[i].prodes+
			"</td></tr>";
					}
					$("#data").get(0).innerHTML=row;
			});
	});

	 $("#search").click(function(){
			pcode=prompt("code");
			//endpoint
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public3/adminsearchstock",
			JSON.stringify(
					//payload
					{
							pcode:pcode
					}
			),
			function(data, status){
					//result
					var json=JSON.parse(data);
			$("#name").get(0).value=json.data[0].name;
		$("#caldate").get(0).value=json.data[0].caldate;
		$("#addquan").get(0).value=json.data[0].addquan;
		$("#prodes").get(0).value=json.data[0].prodes;
					console.log(json);
			});
	});

$("#update").click(function(){
	var name=$("#name").get(0).value;
	var caldate=$("#caldate").get(0).value;
	var addquan=$("#addquan").get(0).value;
	var prodes=$("#prodes").get(0).value;
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public3/adminupdatestock",
			JSON.stringify({
					pcode: pcode,
					name: name,
					caldate: caldate,
					addquan: addquan,
					prodes: prodes
			}),
			function(data, status){
					alert("Data: " + data + "\nStatus: " + status);
			});
	});

	$("#delete").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public3/admindeletestock",
			JSON.stringify({
					pcode:pcode
			}),
			function(data, status){
					alert("Data: " + data + "\nStatus: " + status);
			});
	});
});
