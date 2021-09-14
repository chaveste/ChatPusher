<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <title>Laravel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js' integrity='sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.css' integrity='sha512-H+HWO9L7oLHex/9VCN9kyGaYp96jiJUwadh87k24XzAe+7eLmCdsdaEOfeZTaFmdZ0y4SDdq0eLh8+1OMJQ50g==' crossorigin='anonymous'/>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.js' integrity='sha512-8LIFSzvvyanCM8TSA5f9S++dBWOljWRxuqWA8EKXWlcj0N8yBTXVIJROTJrb6FCVMTR2PtfLh6GexmIz5CgSqA==' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="<?php echo e(url('/css/chat.css')); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


        <!-- Styles -->

    </head>
    <body>
        <div class="wrapper">
            <section class="chat-area">
              <header>

                <a href="" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="<?php echo e(url('/images/user.png')); ?>" alt="">
                <div class="details">
                  <input type="text" class="form-control" id="userID" value="Daniel">
                  <p>Active</p>
                </div>
              </header>
              <div class="chat-box">
                <div class="chat">
                </div>


              </div>
              <form action="#" class="typing-area">
                <!-- <input type="text" class="incoming_id" name="incoming_id" value="1" hidden> -->
                <input id="input-field" type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
              </form>
            </section>
          </div>


    </body>
</html>
<script src="<?php echo e(url('/js/chat.js')); ?>"></script>

<?php /**PATH D:\laragon\www\ChatPusher\resources\views/welcome.blade.php ENDPATH**/ ?>