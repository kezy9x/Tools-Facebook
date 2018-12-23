<?php
date_default_timezone_set('Asia/Ho_Chi_Minh'); // lấy thời gian của việt nam
set_time_limit(0);
error_reporting(0);
$day = date("d"); // lấy ngày hôm nay
$month = date("m"); // lấy tháng hôm nay 
$token = array("token 1","token 2");// cho token vào đây
$block = array("id 1","id 2"); // điền ID người mà bạn không muốn chúc tại đây
for($i=0;$i<count($token);$i++){
    echo "-------------token số [$i]---------------<br>";
$friends = json_decode(file_get_contents('https://graph.facebook.com/me/friends/?fields=birthday,name&access_token='.$token[$i]), true); // lấy dữ liệu bạn bè
$afriends = $friends[data]; //Lọc lấy danh sách
if($afriends != null){
for ($j=0; $j<count($afriends); $j++){ // duyệt danh sách bạn bè
    if(!in_array($afriends[$j][id],$block)){ // kiểm tra xem có trong danh sách block hay k
    $birthday = $afriends[$j][birthday];
    $birthday = explode("/",$birthday);
    if(($day != $birthday[1]) || ($month != $birthday[0])){
      continue;
    }else if(($day == $birthday[1]) && ($month == $birthday[0])){
     sendpost($afriends[$j][id],$token[$i],$afriends[$j][name]);    
     sleep(rand(15,60)); // Mỗi lời chúc cách nhau ngẫu nhiên từ 15 đến 60s tránh bị dính spam
    }
    }
}
}else{
    echo "=> Kiểm tra lại token số $i<br>";
}
    echo "-------------------------------------------<br><br>";
}
function sendpost($ID,$token,$name){
    $imgsend = array('https://i.imgur.com/66joWuK.jpg','https://i.imgur.com/ugvmmXD.jpg','https://i.imgur.com/ybtk04S.jpg','https://i.imgur.com/ucpSogL.jpg','https://i.imgur.com/4fzwZvK.jpg','https://i.imgur.com/MRSy290.jpg','https://i.imgur.com/rmea27E.jpg','https://i.imgur.com/ue98LBP.jpg','https://i.imgur.com/4FbmqPa.jpg','https://i.imgur.com/kpHrprI.jpg');
    $img = $imgsend[rand(0,count($imgsend)-1)];
    switch(rand(1,21)){
    case(1): $loichuc = ""; break;
    case(2): $loichuc = "Hôm nay không như ngày hôm qua, hôm nay là một ngày đặc biệt, là ngày mà một thiên thần đáng yêu đã có mặt trên thế giới này. Chúc ".$name." luôn mỉm cười và may mắn nhé"; break;
    case(3): $loichuc = "Mừng ngày sinh nhật của ".$name.", mừng ngày đó ".$name." sinh ra đời cùng ngàn ngôi sao tỏa sáng."; break;
    case(4): $loichuc = "Happy Birth Day to ".$name." nhé <3"; break;
    case(5): $loichuc = "Hi ! , Chúc ".$name." có một ngày sinh nhật vui vẻ ! <3"; break;
    case(6): $loichuc = "Chúc mừng sinh nhật ".$name.""; break;
    case(7): $loichuc = "Chúc ".$name." có những phút giây thật tuyệt vời bên bạn bè và người thân trong ngày quan trọng này. Hi vọng cậu luôn thành công và hạnh phúc trong cuộc sống."; break;
    case(8): $loichuc = "Chúc bạn luôn luôn 'vui vẻ, tươi trẻ, mạnh khoẻ, tính tình mát mẻ, cuộc đời suôn sẻ' và luôn luôn 'tươi cười, yêu đời, ngời ngời sức sống'."; break;
    case(9): $loichuc = "Hey ! Chúc ".$name." Sinh nhật vui vẻ nhé <3"; break;
    case(10): $loichuc = "Happy Birth Day <3"; break;
    case(11): $loichuc = "Chúc ấy những gì tốt đẹp nhất mà chưa từng ai chúc ấy\nMình sẽ luôn ở đằng sau ấy\nLuôn âm thầm và lặng lẽ đi suốt cuộc đời ấy\nKhi ấy cần, mình sẽ đến bên cạnh ấy\nHAPPY BIRTHDAY TO YOU…!!!"; break;
    case(12):$loichuc = "".$name." biết không, trái đất đang ngừng xoay 1 giây để chúc mừng sinh nhật ".$name." đó."; break;
    case(13):$loichuc = "Chúc mừng sinh nhật ".$name.", sang tuổi mới, thành công mới, nhiều niềm vui mới, nhiều thắng lợi mới, và nếu có thể cả người yêu mới nữa nhé."; break;
    case(14):$loichuc = "Hãy để những lời chúc tốt đẹp nhất của tôi luôn ở bên cạnh cuộc sống tuyệt vời của bạn. Tôi hy vọng trong năm tới bạn luôn khỏe mạnh và thuận buồm xuôi gíó trong mọi việc. Sinh nhật vui vẻ nhé !"; break;
    case(15):$loichuc = "".$name." có thấy những ngôi sao lấp lánh trên bầu trời đang mỉm cười chúc mừng sinh nhật ".$name." không?"; break;
    case(16):$loichuc = "Gửi đến bạn món quà này với cả tấm lòng và một lời chúc bạn sẽ hạnh phúc tràn đầy. Những điều hạnh phúc nhất luôn đến với bạn."; break;
    case(17):$loichuc = "Hôm nay ".date("d")." Tháng ".date("m")."\nChúc Mừng Bạn được sinh ra trong đời\nChúc bạn vui vẻ thảnh thơi\nSức khỏe tuyệt vời, cuộc sống an khang\nChúc bạn kiến thức vững vàng\nGiúp bạn phát triển hành trang ngành nghề\nChúc bạn thỏa chí đam mê\nThành công, thành đạt tràn trề ước mơ."; break;
    case(18): $loichuc = "Sinh nhật vui vẻ, 1 ngày lượm được cọc tiền, 1 tuần lượm được túi tiền, 1 tháng lượm được va li tiền, cả năm ôm tiền mà ngủ."; break;
    case(19): $loichuc = "Thay mặt Chủ tịch nước,\nChủ tịch quốc hội,\nCác Bộ trưởng, các ban ngành,\n84 triệu người Việt Nam,\n6 tỷ dân trên thế giới,\nChúc mừng ngày sinh của thiên thần đáng yêu nhất!"; break;
    case(20): $loichuc="Chúc bạn luôn luôn 'vui vẻ, tươi trẻ, mạnh khoẻ, tính tình mát mẻ, cuộc đời suôn sẻ' và luôn luôn 'tươi cười, yêu đời, ngời ngời sức sống'"; break;
    case(21): $loichuc = "Chúc mọi điều ước trong ngày sinh nhật của bạn đều trở thành hiện thực, hãy thổi nến trên bánh sinh nhật để ước mơ được nhiệm màu."; break;
    }
    $data = array("url" => $img, "caption" => $loichuc);
    $ch = curl_init("https://graph.facebook.com/v3.0/".$ID."/photos?&access_token=".$token."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_exec($ch);
    curl_close($ch);
    echo "+ Đã gửi lời chúc đến <a href='https://facebook.com/".$ID."'>".$name."</a><br>";
    
}   
?>
