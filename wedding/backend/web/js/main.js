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
    $("#contract-start_time").change(function(){

    	$("#contract-timeadd").change(function(){
            
            
                
    		var x = document.getElementById("contract-start_time").value;
    		var y = document.getElementById("contract-timeadd").value;
                var z = document.getElementById("contract-id_local").value;
                
                
                
                  
                 
                //var baseurl='<?php echo Yii::$app->request->baseUrl();?>';
    		window.location.href ='index.php?r=contract%2Fcreate'+ '&&start='+x+'&&end='+x+'&&id_local='+z;
//                exit;
               // $(".info_contract").show();
//                $(".timestart").hide();
                $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
                    // ... Process the result ...
                }
            });
    	});
    });
});

function Getvalue(val){
    return document.getElementById(val).value;
}
