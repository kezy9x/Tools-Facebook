<?php
date_default_timezone_set('Asia/Ho_Chi_Minh'); // lấy thời gian của việt nam
$ID = ""; // điền ID bài viết vào đây !
$token = "";// cho token vào đây
$block = array("id 1","id 2"); // điền ID người mà bạn không muốn chúc tại đây
if($ID != null){
$profile = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token), true); // lấy id của người dùng 
if($profile != null){  
$comment = json_decode(file_get_contents('https://graph.facebook.com/'.$profile['id'].'_'.$ID.'?fields=comments&access_token='.$token), true); // lấy dữ liệu comment
if($comment != null){
$idcmt = $comment['comments']['data'];
    for($j=0;$j<count($idcmt);$j++){
        if(!in_array($idcmt[$j]['from']['id'],$block)){ // kiểm tra xem có trong danh sách block hay k
        $name = json_decode(file_get_contents('https://graph.facebook.com/'.$idcmt[$j]['from']['id'].'?fields=name&access_token='.$token), true); // lấy tên của bạn bè !
       sendpost($idcmt[$j]['from']['id'],$token,$name['name']);
        sleep(rand(15,60)); // dãn cách time tránh dính spam
        }    
    }
}else{
    echo "ID bài viết chưa chính xác<br>";
}
}else{
echo "Kiểm tra lại token <br>";
}
}else{
echo "Chưa điền ID bài viết<br>";    
}

function sendpost($ID,$token,$name){
    $imgsend = array('https://i.imgur.com/mK0FTza.jpg','https://i.imgur.com/6LD6T72.jpg','https://i.imgur.com/yd8jtTX.jpg','https://i.imgur.com/vRg1J4i.jpg','https://i.imgur.com/jjEJVQQ.png','https://i.imgur.com/Wl8y5F2.jpg','https://i.imgur.com/xfbjJcx.jpg','https://i.imgur.com/h44Cq7u.jpg','https://i.imgur.com/lONZvh4.jpg','https://i.imgur.com/s9XNgvX.jpg');
    $img = $imgsend[rand(0,count($imgsend)-1)];
    switch(rand(1,21)){
    case(1): $loichuc = ""; break;
    case(2): $loichuc = "Lời chúc giáng sinh hay nhất tặng người yêu\nNoel ấp áp ngập tràn\nTình yêu chan chứa nụ cười trên môi\nChúc này tôi chúc ".$name."\nGia đình hạnh phúc an lành Noel."; break;
    case(3): $loichuc = "Chúc ".$name." và toàn thể gia đình hưởng mùa Giáng sinh an bình thánh thiện và năm mới được vui tươi , sức khỏe dồi dào và tràn đầy hạnh phúc."; break;
    case(4): $loichuc = "Merry Christmas to ".$name." nhé <3"; break;
    case(5): $loichuc = "Hi ! , Chúc ".$name." có một ngày giáng sinh vui vẻ ! <3"; break;
    case(6): $loichuc = "Giáng sinh chào đến mọi nhà\nCùng nhau vui hát, lời ca chúc mừng\nNào nào cùng đến ăn mừng\nVui say no đủ, rượu mừng trao nhau\nNgày tháng dần nhẹ trôi mau\nĐông vừa nhẹ lướt phủ màu nắng xuân."; break;
    case(7): $loichuc = "Chúc bạn một giáng sinh...\nẤm áp bên cạnh nữa trái tim...\nVui vẻ bên cạnh nữa còn lại trọn vẹn....\nHạnh phúc bên cạnh một bờ vai ai đó....\nMột đêm cho ngày mai và một khắc cho mãi mãi.....\nGiáng sinh an lành, ấm áp tình yêu thương bên người thân yêu!"; break;
    case(8): $loichuc = "Nếu một sáng mai thức dậy, bạn bỗng thấy mình bị nhét vào một cái bao bố thật to và bị lôi đi... thì đừng hoảng sợ nhé, bởi vì tôi đã xin ông già Noel rằng món quà tôi muốn duy nhất chính là bạn! Merry Christmas."; break;
    case(9): $loichuc = "Hey ! Chúc ".$name." một ngày Giáng Sinh vui vẻ nhé <3"; break;
    case(10): $loichuc = "Merry Christmas <3"; break;
    case(11): $loichuc = "Chúc mọi người thân yêu bên cạnh tôi một mùa Giáng sinh vui vẻ, may mắn và an lành. Chúc cho tất cả mọi người trên thế giới này luôn hạnh phúc, chúc cho những em nhỏ không có mái ấm gia đình ấm áp hơn, chúc cho những người già bách niên giai lão, chúc cho mọi điều luôn tốt đẹp nhất. Chúc anh luôn yêu em như vậy. Tôi nguyện cầu mọi điều an lành may mắn đến những người thân yêu của tôi."; break;
    case(12):$loichuc = "Mùa đông lạnh nhưng rất lãng mạn, nắng của mùa đông yếu nhưng đủ làm ấm trái tim một ai đó. Noel là dịp bạn và những người xung quanh tận hưởng những giây phút ngọt ngào của tình yêu thương. Đừng đóng chặt trái tim mình, hãy mở cửa trái tim để biết rằng giữa mùa đông mình vẫn thấy ấm áp. Chúc ".$name." một mùa Giáng Sinh vui vẻ. "; break;
    case(13):$loichuc = "Giáng sinh lại về. Chúc cho ai đó được hạnh phúc bên nửa yêu thương! Chúc cho ai đó còn cô đơn sẽ tìm thấy một bờ vai chia sẽ! Chúc cho ai đó sẽ tìm lại được nhau sau những tháng ngày xa cách!"; break;
    case(14):$loichuc = "Giáng sinh là mùa tận hưởng những điều đơn giản làm cho cuộc sống trở nên tươi đẹp. Có thể bạn sẽ có những kỷ niệm tuyệt vời, vĩnh viễn chạm vào trái tim của bạn trong những ngày cuối năm này. Tôi chúc bạn thật nhiều niềm vui trong mùa này và tất cả mọi điều tốt lành "; break;
    case(15):$loichuc = "Không có thời gian nào tốt hơn để bạn bè và gia đình đến với nhau như Giáng sinh. Có thể ý nghĩa thực sự của mùa này đưa mọi người đến gần với nhau hơn. Tôi luôn mong ".$name." có một mùa Giáng sinh đầy yêu thương."; break;
    case(16):$loichuc = "Gửi đến bạn món quà này với cả tấm lòng và một lời chúc bạn sẽ hạnh phúc tràn đầy. Những điều hạnh phúc nhất luôn đến với bạn."; break;
    case(17):$loichuc = "Một mùa Giáng sinh nữa lại đến. Có thể ngôi nhà của bạn tràn ngập tiếng cười, mãn nguyện, hài hòa và nhiều yêu thương là điều ước tôi dành cho bạn trong mùa Giáng sinh năm nay."; break;
    case(19): $loichuc = " Ý nghĩa thực sự của Giáng sinh là cho đi, chia sẻ tình yêu và tiếp cận với những người đã chạm đến cuộc sống của chúng ta. Đây là thời gian để đếm phước lành và biết ơn họ. Bạn đã chạm vào cuộc sống của tôi theo nhiều cách, và tôi cảm ơn bạn vì đã là một người bạn tuyệt vời. Chúc bạn những điều tốt đẹp nhất của Giáng sinh."; break;
    case(20): $loichuc="Đó là thời gian trong năm để làm mọi thứ chậm lại. Hãy dừng lại một chút, hít thở hương thơm ngọt ngào của thiên nhiên, tận hưởng tiếng hót líu lo của những chú chim và những khoảnh khắc thanh thản cùng gia đình và bạn bè. Có thể cảm giác kỳ diệu của Giáng sinh đang bao quanh bạn từ những điều giản dị nhất. Giáng sinh vui vẻ và an lành!"; break;
    case(21): $loichuc = "Giữa những bài hát mừng Giáng sinh đang rộn ràng, ông già Noel có thể ban cho bạn nhiều điều ước không thể đếm được, những khoảnh khắc ngọt ngào khiến trái tim bạn mãn nguyện. Đừng quên luôn có một người sát cánh bên bạn, là tôi."; break;
    }
    $data = array("url" => $img, "caption" => $loichuc);
    $ch = curl_init("https://graph.facebook.com/v3.0/".$ID."/photos?&access_token=".$token."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_exec($ch);
    curl_close($ch);
}   
?>
