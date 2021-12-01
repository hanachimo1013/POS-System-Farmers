$(document).ready(function(){
	var id="";
	$("#save").click(function(){
		var fname=$("#fname").get(0).value;
		var lname=$("#lname").get(0).value;
		var mini=$("#mini").get(0).value;
		var numb=$("#numb").get(0).value;
		var numb=$("#address").get(0).value;
		$.post("http://www.localhost/POS-System-Farmers/src/ui/public/admin/public/adminmemberpostName",
		JSON.stringify({
			fname: fname,
			lname: lname,
			mini: mini,
			numb: numb,
			address: address
		}),
		function(data1,status){
			alert("Data: " + data1 + "\nStatus: " + status);
		});
	});

	 $("#display").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/adminmemberpostPrint",
			function(data1, status){
					var json=JSON.parse(data1);
					var row="";
					for(var i=0;i<json.data.length;i++){
							row=row+"<tr><td>"+json.data[i].id+
			"</td><td>"+json.data[i].fname+
			"</td><td>"+json.data[i].lname+
			"</td><td>"+json.data[i].mini+
			"</td><td>"+json.data[i].numb+
			"</td><td>"+json.data[i].address+
			"</td></tr>";
					}
					$("#data1").get(0).innerHTML=row;
			});
	});

	 $("#search").click(function(){
			id=prompt("code1");
			//endpoint
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/adminsearchmember",
			JSON.stringify(
					//payload
					{
							id:id
					}
			),
			function(data1, status){
					//result
					var json=JSON.parse(data1);
			$("#fname").get(0).value=json.data[0].fname;
		$("#lname").get(0).value=json.data[0].lname;
		$("#mini").get(0).value=json.data[0].mini;
		$("#numb").get(0).value=json.data[0].numb;
		$("#numb").get(0).value=json.data[0].address;
					console.log(json);
			});
	});

$("#update").click(function(){
	var fname=$("#fname").get(0).value;
	var lname=$("#lname").get(0).value;
	var mini=$("#mini").get(0).value;
	var numb=$("#numb").get(0).value;
	var numb=$("#address").get(0).value;
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/adminupdatemember",
			JSON.stringify({
					id: id,
					fname: fname,
					lname: lname,
					mini: mini,
					numb: numb,
					address: address
			}),
			function(data1, status){
					alert("Data: " + data1 + "\nStatus: " + status);
			});
	});

	$("#delete").click(function(){
			$.post("http://localhost/POS-System-Farmers/src/ui/public/admin/public/admindeletemember",
			JSON.stringify({
					id:id
			}),
			function(data1, status){
					alert("Data: " + data1 + "\nStatus: " + status);
			});
	});
});
