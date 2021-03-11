<?php
include_once '../../../core/init.php';
include_once '../../../function/functions.php';
$cin = $_GET["cin"];
$db = DB::getInstance();
$sql = "SELECT ml.id_message, IF(ms.sender_id = ?, ml.user_id, ms.sender_id) user, ml.user_id, ms.date 
        from messages ms 
        JOIN message_list ml on ms.id_message = ml.id_message 
        JOIN utilisateur u on ml.user_id = u.cin
        where ms.sender_id=? or ml.user_id=?
        group by user
        order by ms.date desc";

$resultats = $db->query($sql, array($cin, $cin, $cin));

echo '<div class="list-group rounded-0">';
foreach ($resultats->results() as $row) {
    $persone = get_user_info($row->user);
    $lastmessage = lastMessage($cin, $row->user)

?>

    <a att="<?php echo $row->user; ?>" class="list-group-item list-group-item-action rounded-0 chat <?php if ($lastmessage->isread == 0 and $lastmessage->user_id == $cin) {
                                                                                                        echo 'active text-white';
                                                                                                    } ?>  ">
        <div class="media"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0"><?php echo ucfirst($persone->nom) . ' ' . $persone->prenom ?></h6><small class="small font-weight-bold"><?php $date = date_create($row->date);
                                                                                                                                                echo date_format($date, 'd M '); ?></small>
                </div>
                <p class="font-italic mb-0 text-small"><?php echo substr($lastmessage->message, 0, 100); ?></p>
            </div>
        </div>
    </a>
<?php
}
?>
</div>
<script>
    $(document).ready(function() {
        let cin = $("#idPerson").val()
        $('.chat').click(function() {
            let talkwith = $(this).attr("att");
            $.ajax({
                url: "./messages/get_conv.php",
                method: "GET",
                data: {
                    cin: cin,
                    talkwith: talkwith
                },
                dataType: "text",
                // beforeSend: function() {
                //   $("#spinner").show();
                // },
                // complete: function() {
                //   $("#spinner").hide();
                // },
                success: function(data) {
                    $('.conv').html(data);
                }
            });
        });
   
    });
</script>