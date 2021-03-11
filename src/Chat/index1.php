<?php
include_once '../../core/init.php';
$db = DB::getInstance();
$User = new User();
if (!$User->isLoggedIn()) {
  header("Location: ../../");
} else {
  $cin = $User->data()->cin;
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../lib/bootstrapIndex.css" rel="stylesheet">
    <link href="../../lib/font-awesome.css" rel="stylesheet">
    <link href="../../layout/css/chatboxstyle.css" rel="stylesheet">
    <title>Your messages</title>
  </head>

  <body>
    <div class="container py-5 px-4">
      <div class="logout">
        <span><i class="sign-out-alt"></i></span>
        <a href="../login_logout/logout.php" style="color: black; font-size: 20px;">Log out</a>
        <a id="test">ziad</a>
      </div>
      <div class="row rounded-lg overflow-hidden shadow">
        <!-- Users box-->
        <div class="col-5 px-0">
          <div class="bg-white">

            <div class="bg-gray px-4 py-2 bg-light">
              <p class="h5 mb-0 py-1">Recent</p>
            </div>

            <div class="messages-box">

            </div>
          </div>
        </div>
        <!-- Chat Box-->
        <div class="col-7 px-0 conv">

        </div>
      </div>
    </div>
    <input type="hidden" id="idPerson" value="<?php echo $cin ?>">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../../lib/bootstrapIndex.js"></script>
    <script>
      $(document).ready(function() {
        let cin = $("#idPerson").val()
        let talkwith = $('.chat').attr("att");
        // $.ajax({
        //   url: "./messages/getchats.php",
        //   method: "GET",
        //   data: {
        //     cin:cin
        //   },
        //   dataType: "text",
        //   // beforeSend: function() {
        //   //   $("#spinner").show();
        //   // },
        //   // complete: function() {
        //   //   $("#spinner").hide();
        //   // },
        //   success: function(data) {
        //     $('.messages-box').html(data);
        //   }
        // });
        $("#test").click(function() {
          $('.messages-box').load("./messages/getchats.php?cin=" + cin)
          console.log(talkwith);
        });

       
      


      });
    </script>
  </body>

  </html>
<?php } ?>