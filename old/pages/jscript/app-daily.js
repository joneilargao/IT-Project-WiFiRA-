$(document).ready(function(){
	$.ajax({
		url: "fragments/data-daily.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var salesid1 = [];
			var dateused1 = [];

			for(var i in data) {
				dateused1.push(data[i].dateUsed);
				salesid1.push(0, data[i].totalsales);
			}

			var chartdata = {
				labels: dateused1,
				datasets : [
					{
						label: 'Sales',
						backgroundColor: 'hsl(120, 60%, 70%)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'hsl(30, 100%, 60%)',
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