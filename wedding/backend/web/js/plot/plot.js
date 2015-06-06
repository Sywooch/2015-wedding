
function thongkehopdong(year){
    var b = {year:year};
     $.ajax({
        url : 'index.php?r=user/contract',
        data :  b ,
        dataType : 'json',
        type : 'POST',
 
 
        success : function(data) {
           
                var set = {
                               label: "Số lượng hợp đồng",
                                data: data,
                                bars: {
                                    show: true,
                                    fillColor: { colors: [{ opacity: 0.5 }, { opacity: 1 }] },
                                    barWidth: 0.5,
                                    align: "center",
                                    lineWidth: 1,
                                }
                            };



                     $.plot("#placeholder", [ set], {
                             series: {
                                     bars: {
                                             show: true,
                                             barWidth: 0.6,
                                             align: "center"
                                     }
                             },
                             xaxis: {
                                     ticks: [[1, "Tháng 1"], [2, "Tháng 2"], [3, "Tháng 3"], [4, "Tháng 4"], [5, "Tháng 5"], [6, "Tháng 6"],
                                    [7, "Tháng 7"], [8, "Tháng 8"], [9, "Tháng 9"], [10, "Tháng 10"], [11, "Tháng 11"], [12, "Tháng 12"]],
                                    axisLabel: "Tháng",
                                    axisLabelUseCanvas: true,
                                    axisLabelFontSizePixels: 12,
                                    axisLabelFontFamily: 'Verdana, Arial',
                                    axisLabelPadding: 3,
                                    tickColor: "#5E5E5E",
                                    color: "black"
                             },
                             grid: {
                                    hoverable: true,
                                    borderWidth: 2,
                                    backgroundColor: { colors: ["#171717", "#4F4F4F"] }
                             },
                             legend: {
                                    noColumns: 0,
                                    labelBoxBorderColor: "#858585",
                                    position: "ne"
                                },
                             yaxis: {
                                    tickColor: "#5E5E5E",
                                    color: "black",
                                    tickDecimals: 0,
                                    axisLabel: "Tháng",
                                    axisLabelUseCanvas: true,
                                    axisLabelFontSizePixels: 12,
                                    axisLabelFontFamily: 'Verdana, Arial',
                                    axisLabelPadding: 10
                                },  
                     });
             }
     });
}


$(function(){
    thongkehopdong(2015);
    thongkephoto(2015);

})
$("#year-contract").change(function(){
    
    var e = document.getElementById("year-contract");
    var strUser = e.options[e.selectedIndex].value;
    //alert(strUser);
    thongkehopdong(strUser);

})


$("#year-photo").change(function(){
    
    var e = document.getElementById("year-photo");
    var strUser = e.options[e.selectedIndex].value;
    //alert(strUser);
    thongkephoto(strUser);

})

function thongkephoto(year){
    
    
    var b = {year:year};
     $.ajax({
        url : 'index.php?r=user/hehe',
        data :  b ,
        dataType : 'json',
        type : 'POST',
 
 
        success : function(data) {
                alert(data);
                var set = {
                               label: "top photo",
                                data: data,
                                bars: {
                                    show: true,
                                    fillColor: { colors: [{ opacity: 0.5 }, { opacity: 1 }] },
                                    barWidth: 0.5,
                                    align: "center",
                                    lineWidth: 1,
                                }
                            };



                     $.plot("#placeholder1", [ set], {
                             series: {
                                     bars: {
                                             show: true,
                                             barWidth: 0.6,
                                             align: "center"
                                     }
                             },
                             xaxis: {
                                    ticks: [[0, "Tháng 1"], [1,"Tháng 2"], [2,"Tháng 3"]],
                                    
                                       
                                    
                                    axisLabel: "Tháng",
                                    axisLabelUseCanvas: true,
                                    axisLabelFontSizePixels: 12,
                                    axisLabelFontFamily: 'Verdana, Arial',
                                    axisLabelPadding: 3,
                                    tickColor: "#5E5E5E",
                                    color: "black"
                             },
                             grid: {
                                    hoverable: true,
                                    borderWidth: 2,
                                    backgroundColor: { colors: ["#171717", "#4F4F4F"] }
                             },
                             legend: {
                                    noColumns: 0,
                                    labelBoxBorderColor: "#858585",
                                    position: "ne"
                                },
                             yaxis: {
                                    tickColor: "#5E5E5E",
                                    color: "black",
                                    tickDecimals: 0,
                                   // axisLabel: "Tháng",
                                    axisLabelUseCanvas: true,
                                    axisLabelFontSizePixels: 12,
                                    axisLabelFontFamily: 'Verdana, Arial',
                                    axisLabelPadding: 10
                                },  
                     });
             }
     });
}

