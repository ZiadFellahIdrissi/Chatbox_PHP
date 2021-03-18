<?php
include_once '../../../core/init.php';
include_once '../../../function/functions.php';
$cin = $_GET["cin"];
$talkwith = $_GET["talkwith"];

$db = DB::getInstance();
$sql = 'SELECT m.message,m.sender_id,ml.user_id, m.date
	from messages m 
    NATURAL join message_list ml 
    where ( m.sender_id=? and ml.user_id=? ) or (m.sender_id=? and ml.user_id=?)
    ORDER by m.date asc';

$resultats = $db->query($sql, array($cin, $talkwith, $talkwith, $cin));

echo '<div class="px-4 py-5 chat-box bg-white">';
foreach ($resultats->results() as $row) {
    if ($row->sender_id != $cin) {
?>
        <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2">
                    <p class="text-small mb-0 text-muted"><?php echo $row->message ?></p>
                </div>
                <p class="small text-muted"><?php $date = date_create($row->date);
                                            echo date_format($date, 'g:i A '); ?></p>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="media w-50 ml-auto mb-3">
            <div class="media-body">
                <div class="bg-primary rounded py-2 px-3 mb-2">
                    <p class="text-small mb-0 text-white"><?php echo $row->message ?></p>
                </div>
                <p class="small text-muted"><?php $date = date_create($row->date);
                                            echo date_format($date, 'g:i A '); ?></p>
            </div>
        </div>

<?php
    }
}
?>
</div>

<!-- Typing area -->
<form class="bg-light">
    <div class="input-group">
        <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light msgsend">
        <div class="input-group-append">
            <button id="button-addon2" type="button" class="btn btn-link btnsend"> <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</form>
<input type="hidden" id="idPerson" value="<?php echo $cin ?>">
<input type="hidden" id="talkwith" value="<?php echo $talkwith ?>">

<script>
    var talkwith = $("#talkwith").val();
    var cin = $("#idPerson").val();
    $(".btnsend").click(function() {
        let msg = $(".msgsend").val();
        $.ajax({
            url: "./messages/send_message.php",
            method: "GET",
            data: {
                cin: cin,
                talkwith: talkwith,
                msg: msg
            },
            dataType: "text",
            // beforeSend: function() {
            //   $("#spinner").show();
            // },
            // complete: function() {
            //   $("#spinner").hide();
            // },
            success: function(data) {
                $('.conv').load("./messages/get_conv.php?cin=" + cin + "&talkwith=" + talkwith);
                $('.messages-box').load("./messages/getchats.php?cin=" + cin);
            }
        });
    });
    $('.chat-box').animate({
        scrollTop: 9999
    }, 0);

    // setInterval(() => {
    //     $('.conv').load("./messages/get_conv.php?cin=" + cin + "&talkwith=" + talkwith);
    //     $('.messages-box').load("./messages/getchats.php?cin=" + cin);
    // }, 2000);


</script>