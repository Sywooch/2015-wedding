
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







function thongkephoto(year){
    
    
    var b = {year:year};
     $.ajax({
        url : 'index.php?r=user/plotphoto',
        data :  b ,
        dataType : 'json',
        type : 'POST',
 
 
        success : function(data) {
              //  alert(data);
                var ticks = [];
                
                for(var i = 0; i < data.length; i++){
                    ticks.push([i,data[i][0]]);
                     
                }
                var dataset = [];
               for(var j = 0; j < data.length;j++){
                    dataset.push([j,data[j][1]]);
                     
                }

                var set = {
                               label: "top photo",
                                data: dataset,
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
                                  
                                    
                                    ticks:ticks,
                                    
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






function thongkemakeup(year){
    
   // alert(year);
    
    var b = {year:year};
     $.ajax({
        url : 'index.php?r=user/plotmakeup',
        data :  b ,
        dataType : 'json',
        type : 'POST',
 
 
        success : function(data) {
                //alert(data);
                var ticks = [];
                
                for(var i = 0; i < data.length; i++){
                    ticks.push([i,data[i][0]]);
                     
                }
                var dataset = [];
               for(var j = 0; j < data.length;j++){
                    dataset.push([j,data[j][1]]);
                     
                }

                var set = {
                               label: "Top Makeup",
                                data: dataset,
                                bars: {
                                    show: true,
                                    fillColor: { colors: [{ opacity: 0.5 }, { opacity: 1 }] },
                                    barWidth: 0.5,
                                    align: "center",
                                    lineWidth: 1,
                                }
                            };



                     $.plot("#placeholder2", [ set], {
                             series: {
                                     bars: {
                                             show: true,
                                             barWidth: 0.6,
                                             align: "center"
                                     }
                             },
                             xaxis: {
                                  
                                    
                                    ticks:ticks,
                                    
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



function thongkediadiem(year){
    
    //alert(year);
    var b = {year:year};
     $.ajax({
        url : 'index.php?r=user/plotlocal',
        data :  b ,
        dataType : 'json',
        type : 'POST',
 
        
        success : function(data) {
              //  alert(data);
                var ticks = [];
                
                for(var i = 0; i < data.length; i++){
                    ticks.push([i,data[i][0]]);
                     
                }
                var dataset = [];
               for(var j = 0; j < data.length;j++){
                    dataset.push([j,data[j][1]]);
                     
                }

                var set = {
                               label: "top localtion",
                                data: dataset,
                                bars: {
                                    show: true,
                                    fillColor: { colors: [{ opacity: 0.5 }, { opacity: 1 }] },
                                    barWidth: 0.5,
                                    align: "center",
                                    lineWidth: 1,
                                }
                            };



                     $.plot("#placeholder3", [ set], {
                             series: {
                                     bars: {
                                             show: true,
                                             barWidth: 0.6,
                                             align: "center"
                                     }
                             },
                             xaxis: {
                                  
                                    
                                    ticks:ticks,
                                    
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


function thongkeaocuoi(year){
    
    //alert(year);
    var b = {year:year};
     $.ajax({
        url : 'index.php?r=user/plotdress',
        data :  b ,
        dataType : 'json',
        type : 'POST',
 
        
        success : function(data) {
              //  alert(data);
                var ticks = [];
                
                for(var i = 0; i < data.length; i++){
                    ticks.push([i,data[i][0]]);
                     
                }
                var dataset = [];
               for(var j = 0; j < data.length;j++){
                    dataset.push([j,data[j][1]]);
                     
                }

                var set = {
                               label: "top dress",
                                data: dataset,
                                bars: {
                                    show: true,
                                    fillColor: { colors: [{ opacity: 0.5 }, { opacity: 1 }] },
                                    barWidth: 0.5,
                                    align: "center",
                                    lineWidth: 1,
                                }
                            };



                     $.plot("#placeholder4", [ set], {
                             series: {
                                     bars: {
                                             show: true,
                                             barWidth: 0.6,
                                             align: "center"
                                     }
                             },
                             xaxis: {
                                  
                                    
                                    ticks:ticks,
                                    
//                                    axisLabel: "Tháng",
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


$("#year-makeup").change(function(){
    var ee = document.getElementById("year-makeup");

    var strUser = ee.options[ee.selectedIndex].value;

    thongkemakeup(strUser);
});


$("#year-local").change(function(){
    var ee = document.getElementById("year-local");

    var strUser = ee.options[ee.selectedIndex].value;

    thongkediadiem(strUser);
});

$("#year-contract").change(function(){
    
    var e = document.getElementById("year-contract");
    var strUser = e.options[e.selectedIndex].value;
    //alert(strUser);
    thongkehopdong(strUser);
    //thongkephoto(strUser);

});
$("#year-photo").change(function(){
    var ee = document.getElementById("year-photo");

    var strUser = ee.options[ee.selectedIndex].value;

    thongkephoto(strUser);
});

$("#year-dress").change(function(){
    var ee = document.getElementById("year-dress");

    var strUser = ee.options[ee.selectedIndex].value;
    //alert(strUser);
    thongkeaocuoi(strUser);
});

$(function(){
    thongkehopdong(2015);
    thongkephoto(2015);
    thongkemakeup(2015);
    thongkediadiem(2015);
    thongkeaocuoi(2015);

});