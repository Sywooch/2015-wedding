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
                    $("#foo").show();
                }else{
                    $("#foo").hide();
                } 
            });
});
