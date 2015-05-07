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

