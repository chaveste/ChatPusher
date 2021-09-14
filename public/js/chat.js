

var form =$(".typing-area");
var inputField = $(".input-field");
var sendBtn = $(".typing-area button");
var chatBox = $(".chat-box");
var auxscrolltop=0;
var userID=$("#userID").val();


$(document).ready(function(){
    $.ajax({
        url: 'https://laravel.ticketoff.mx/GetAllMessage',
        success: function (result) {
            console.log(JSON.stringify(result))
            $.each(result, function(i,item) {
                var msg="";
                if(item.username!=userID){
                    msg+= "<div class='chat outgoing'>"
                }
                else{
                    msg+= "<div class='chat incoming'>"
            }
            msg+="<div class='details'>"+
                    "<span style='font-size:12px; font-style: italic;'>"+item.username+"</span>"+
                    "<p>"+ item.message +"</p>"+
                "</div>"+
            "</div>";

            $('.chat-box .chat:last-child').after(msg);
                scrollToBottom();

            });
        }
    });

});


form.click(function(event){
    event.preventDefault();
  });

inputField.focus();

inputField.keyup(function(){
    if(inputField.val() != ""){
        sendBtn.addClass("active");
    }else{
        sendBtn.removeClass("active");
    }
});


chatBox.mouseenter(function(){
    chatBox.addClass("active");
});

chatBox.mouseleave(function(){
    chatBox.removeClass("active");
});


Pusher.logToConsole = true;
var pusher = new Pusher('369c111e2ba09a679a53', {
    cluster: 'us2'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function (data) {
        if(data.message!= undefined){
            var msg="";
            if(data.userid!=userID){
                msg+= "<div class='chat outgoing'>"
            }
            else{
                msg+= "<div class='chat incoming'>"
        }
        msg+="<div class='details'>"+
                "<span style='font-size:12px; font-style: italic;'>"+data.userid+"</span>"+
                "<p>"+ data.message +"</p>"+
            "</div>"+
        "</div>";

        $('.chat-box .chat:last-child').after(msg);
            scrollToBottom();
        }
});
var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}

sendBtn.click(function(){
    sendBtn.removeClass("active");
    var message = inputField.val();
    inputField.val('');
    if (message != "") {
        $.ajax({
            url: 'http://laravel.ticketoff.mx/SendMessage',
            // headers: headers,
            // method:'post',
            data: { messageDTO: message, useridDTO:$("#userID").val() }, //aquí deberías pasarle el id del usuario logueado
            success: function (result) {

            }
        });
    }
});

function scrollToBottom(){
    chatBox.scrollTop(chatBox.height()+auxscrolltop);
    auxscrolltop+=100;
  }
