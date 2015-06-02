function chartcontract(b,id){
   // alert(b);
    $(function() {
                
                var data = b;
		var dataset = [
		    { label: "2012 Average Temperature", data: data, color: "#5482FF" }
		];

		$.plot(id, [ data ,dataset], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

		// Add the Flot version string to the footer

	});

}

//$(function (){
//    alert('asdasdas');
//});


