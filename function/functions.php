<?php 
function do_i_have_messages($id){
    $sql='SELECT message_list.id_message,messages.date, Utilisateur.cin
    FROM `message_list` 
    join Messages on message_list.id_message = messages.id_message 
    join Utilisateur on Utilisateur.cin = Messages.sender_id 
    where message_list.user_id = ? 
    and message_list.isread= ?
    GROUP BY Utilisateur.cin order by messages.date';

}
function get_user_info($cin){
    $sql='SELECT cin, nom, prenom , date_naissance, telephone,email, username 
          from utilisateur 
          where cin=?';
    return DB::getInstance()->query($sql,[$cin])->first();
}

function lastMessage($sender , $user){
    $sql='SELECT m.message, date, ml.isread,ml.user_id from messages m 
    NATURAL join message_list ml 
    where ( m.sender_id=? and ml.user_id=? ) or (m.sender_id=? and ml.user_id=?)
    ORDER by m.date DESC LIMIT 1';
    return DB::getInstance()->query($sql,[$sender,$user,$user,$sender])->first();
}

// function is_read($id_message){
//     $sql='SELECT ml.isread from message_list ml where ml.id_message = ?';
//     return DB::getInstance()->query($sql,[$id_message])->first();
// }
?>
