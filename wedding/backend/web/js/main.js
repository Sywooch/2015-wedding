$(function(){
    $('#createimg').click(function(){
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    })
});

$(function(){
    //alert('ádasdasd');
    $('#createamb').click(function(){
        $('#modal_amb').modal('show')
                .find('#modalContent_amb')
                .load($(this).attr('value'));
  
    })
});

$(function(){
    $('#create_img').click(function(){
        $('#modal_img').modal('show')
                .find('#modalContent_img')
                .load($(this).attr('value'));
    })
});

$(document).ready(function (){
            $("#signupform-type_user").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == "1") {
                    $(".email-customer").show();
                    $(".fullname-customer").show();
                    $(".tell-customer").show();
                    $(".staff").hide();
                }else if($(this).val() != "1" &&$(this).val() != "0"){
                    $(".email-customer").hide();
                    $(".fullname-customer").hide();
                    $(".tell-customer").hide();
                    $(".staff").show();
                }else{
                    $(".email-customer").hide();
                    $(".fullname-customer").hide();
                    $(".tell-customer").hide();
                    $(".staff").hide();
                } 
            });
});
$(function(){

    $(".a").change(function(){
        if( $('#contract-id_local').val() && $('#contract-start_time').val() && $('#contract-timeadd').val() ) {
           var x = document.getElementById("contract-start_time").value;
            var y = document.getElementById("contract-timeadd").value;
           var z = document.getElementById("contract-id_local").value;
            //window.location.href ='index.php?r=contract/create'+ '&&start='+x+'&&end='+x+'&&id_local='+z;
            
            var url = window.location.href.split("/");
            
            var check;
            for(var i = 1; i <= url.length-1; i++){
               if(url[i]=='index.php?r=contract')
               {
                   check = i;
               }
            }
            
            var test = url[check+1].split("&&");
            var checkupdate = false
            if(test[0]=='update'){
                checkupdate = true;
            }
            
            if(checkupdate){
                window.location.href ='index.php?r=contract/getendtime'+ '&&start='+x+'&&timeadd='+y+'&&id_local='+z+"&&update&&"+test[1];
            }
            else window.location.href ='index.php?r=contract/getendtime'+ '&&start='+x+'&&timeadd='+y+'&&id_local='+z;
            
           //  
       }
    });   
});





//     
      
    
        
        
        
        



