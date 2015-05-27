function plot(){
    $(function() {

		var data = [ ["January", 10], ["February", 8], ["March", 25], ["April", 13], ["May", 17], ["June", 9] ,["July", 35.5],["Aug", 3.5] ,["Sep", 35.5],["Oct", 17]];

		var dataset = [
		    { label: "2012 Average Temperature", data: data, color: "#5482FF" }
		];

		$.plot("#placeholder", [ data ,dataset], {
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


function test(){
    alert('asdasdas');
}