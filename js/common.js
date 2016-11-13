$(function () {
    $('#deadline').datepicker({dateFormat: 'yy-mm-dd'});
});

$(document).ready(function(){
    if($("input[name=isFunded]:checked").val() == "Yes"){
        $('#fundDiv').show();
    }
    else{
        $('#fundDiv').hide();
    }
    $("input[name=isFunded]").click(function(){
        if($(this).val() == "Yes"){
            $('#fundDiv').show('medium');
        }
        else{
            $('#fundDiv').hide('medium');
            $('#fundAmt').val(0);
        }
    });
    $('.hiddenDiv').hide();
});

function validateForm(){
    var isAllCompleted = true;
//    console.log($('input[name=isFunded]:checked').val().trim().length);
    $('.required').each(function(){
        $(this).prev().removeClass('error');
        if($(this).val().trim().length == 0){
            isAllCompleted = false;
            $(this).prev().addClass('error');
        }
    });
    var urgent = true;
    $('#urgentText').removeClass('error');
    if(!$('input[name=isUrgent]:checked').val().trim().length){
        $('#urgentText').addClass('error');
        urgent = false;
    }
    if(!urgent){
        isAllCompleted = urgent;
    }
    
    var funded = true;
    $('#fundedText').removeClass('error');
    if(!$('input[name=isFunded]:checked').val().trim().length){
        $('#fundedText').addClass('error');
        funded = false;
    }
    if(!funded){
        isAllCompleted = funded;
    }
    return isAllCompleted;
}
function revealComment(){
    $('.hiddenDiv').toggle('medium');
}
function changeVal(){
    $('#submitVal').val(1);
}