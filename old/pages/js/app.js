$(document).ready(function(){
	$.ajax({
		url: "http://localhost/wifira/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var salesid1 = [];
			var dateused1 = [];

			for(var i in data) {
				dateused1.push(data[i].dateUsed);
				salesid1.push(data[i].salesID);
			}

			var chartdata = {
				labels: dateused1,
				datasets : [
					{
						label: 'Sales',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: salesid1
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});

		},
		error: function(data) {
			console.log(data);
		}
	});
});