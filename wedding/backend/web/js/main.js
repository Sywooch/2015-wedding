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
        Galleria.loadTheme('js/js/galleria.folio.min.js');
//        if(Galleria.loadTheme('js/js/galleria.folio.min.js')){
//            alert("Load true!!");
//        }
//        else alert("Load False!!");
//        if(Galleria.run('#albumView')){
//             alert("Load true!!");
//        } else alert("Load False!!");
        
	Galleria.run('#albumView',{
            imageCrop: true,
            maxScaleRatio: 1,
            preload: 3,
            fullscreenTransition:'slide'
        });
});