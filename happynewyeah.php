<?php
$selecter = "like"; // Lựa chọn chuyển đổi giữa like và cmt
$ID = ""; // điền ID bài viết vào đây !
$token = "";// cho token vào đây
$block = array("id 1","id 2"); // điền ID người mà bạn không muốn chúc tại đây
if($ID != null){
$profile = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token), true); // lấy id của người dùng 
$file = file_get_contents('log.txt');
if($profile != null){
if($selecter == "cmt"){	
$data = json_decode(file_get_contents('https://graph.facebook.com/'.$profile['id'].'_'.$ID.'?fields=comments&access_token='.$token), true); // lấy dữ liệu comment
if($data != null){
$idcmt = $data['comments']['data'];
    for($j=0;$j<count($idcmt);$j++){
		$idsend = $idcmt[$j]['from']['id'];
        if(!in_array($idsend ,$block)){ // kiểm tra xem có trong danh sách block hay k
        if((!strpos($file,$idsend,0)) && ($idsend != $profile['id'])) { // check trùng
        $name = json_decode(file_get_contents('https://graph.facebook.com/'.$idsend.'?fields=name&access_token='.$token), true); // lấy tên của bạn bè !
      sendpost($idsend,$token,$name['name']);
      logs("done | ".$idsend."\n");
      sleep(rand(15,60)); // dãn cách time tránh dính spam
        }} 
    }
}else{
    echo "ID bài viết chưa chính xác<br>";
}
}else if ($selecter == "like"){
$data = json_decode(file_get_contents('https://graph.facebook.com/'.$profile['id'].'_'.$ID.'?fields=reactions{id}&access_token='.$token), true); // lấy dữ liệu like
if($data != null){
$idlike = $data['reactions']['data'];
    for($j=0;$j<count($idlike);$j++){
		$idsend = $idlike[$j]['id'];
        if(!in_array($idsend ,$block)){ // kiểm tra xem có trong danh sách block hay k
        if((!strpos($file,$idsend,0)) && ($idsend != $profile['id'])) { // check trùng
        $name = json_decode(file_get_contents('https://graph.facebook.com/'.$idsend.'?fields=name&access_token='.$token), true); // lấy tên của bạn bè !
      logs("done | ".$idsend."\n");
      sendpost($idsend,$token,$name['name']);
    sleep(rand(15,60)); // dãn cách time tránh dính spam
        }}   
    }
}else{
    echo "ID bài viết chưa chính xác<br>";
}
}else{
echo "Bạn chưa lựa chọn đúng";
}
}else{
echo "Kiểm tra lại token <br>";
}
}else{
echo "Chưa điền ID bài viết<br>";    
}


function sendpost($ID,$token,$name){
    $imgsend = array('https://i.imgur.com/jn3Flbi.jpg','https://i.imgur.com/YkmQpbX.jpg','https://i.imgur.com/QQvtNrC.jpg','https://i.imgur.com/F0zm9ld.jpg','https://i.imgur.com/Y2mRqZO.jpg','https://i.imgur.com/7ZLduh6.jpg','https://i.imgur.com/HCZb9q6.jpg','https://i.imgur.com/86gHksl.jpg','https://i.imgur.com/W47EgRn.jpg','https://i.imgur.com/QSKiaiV.jpg','https://i.imgur.com/A9F0G2F.jpg');
    $img = $imgsend[rand(0,count($imgsend)-1)];
    switch(rand(1,21)){
    case(1): $loichuc = ""; break;
    case(2): $loichuc = "Năm hết tết đến kính chúc mọi người thật nhiều sức khoẻ, miệng cười vui vẻ, tiền vào mạnh mẽ, cái gì cũng được suôn sẻ, để sống tiếp một cuộc đời thật là đẹp đẽ,…"; break;
    case(3): $loichuc = "Hôm nay có 3 người hỏi tôi về bạn và tôi đã giúp để họ tìm đến với bạn ngay. Tên của 3 người ấy là Hạnh phúc, Thịnh vượng và Tình yêu."; break;
    case(4): $loichuc = "Happy New Yeah <3 ".$name.""; break;
    case(5): $loichuc = "Hi ".$name." , Chúc mừng năm mới !!! <3"; break;
    case(6): $loichuc = "Tết Nguyên Đán ta chúc nhau sức khỏe nhiều. Bạc tiền rủng rỉnh thoải mái tiêu. Gia đình hạnh phúc bè bạn quý. Thanh thản vui chơi mọi buổi chiều"; break;
    case(7): $loichuc = "Chúc bạn có 1 bầu trời sức khỏe, 1 Biển cả tình thương, 1 Đại dương tình bạn, 1 Điệp khúc tình yêu, 1 Người yêu chung thủy, 1 Sự nghiệp sáng ngời, 1 Gia đình thịnh vượng"; break;
    case(8): $loichuc = "Ra đi gặp được bạn hiền. Quay về gặp được người thương yêu mình. Sang xuân sự nghiệp hanh thông. Tài cao, chí lớn vẫy vùng đó đây"; break;
    case(9): $loichuc = "Mừng ".$date('Y')." phát tài phát lộc\n Tiền vô xồng xộc, tiền ra từ từ\n Sức khoẻ có dư, công danh tấn tới\n Tình duyên phơi phới, hạnh phúc thăng hoa\n Xin chúc mọi nhà một năm đại thắng."; break;
    case(10): $loichuc = "Chúc mừng năm mới <3"; break;
    case(11): $loichuc = "Đêm nay giao thừa lại về, năm mới lại đến, chúc cho ai đó hạnh phúc bên nửa yêu thương. Chúc cho ai đó còn cô đơn sẽ tìm thấy một bờ vai chia sẻ, chúc cho ai đó tìm được nhau sau tháng năm dài xa cách. Chúc cho năm mới tràn đầy niềm vui, hạnh phúc vừa đủ và bình yên thật nhiều."; break;
    case(12):$loichuc = "Một lời chào mong một ngày may mắn. Một lới nhắn nhủ mong bạn thành công. Một lời chúc mong bạn ấm lòng. Một nụ cười để vượt qua tất cả. Một ý chí để đập tan vất vả, lo âu. Một năm mới tràn đầy niềm vui và hạnh phúc. Chúc mừng Tết âm lịch ".date('Y').""; break;
    case(13):$loichuc = "Tân niên hạnh phúc bình an tiến\nXuân nhật vinh hoa phú quý lai"; break;
    case(14):$loichuc = "Cạn ly mừng năm qua đắc lộc\nNâng cốc chúc năm mới phát tài."; break;
    case(15):$loichuc = "Năm mới chúc bạn cười đến chẹo quai hàm, ham làm đến quên mệt mỏi, học giỏi đến khỏi lo thi, cứ đo là thành, cứ ăn là khỏe …. Happy new year!"; break;
    case(16):$loichuc = "Chúc bạn: 12 tháng phú quý, 365 ngày phát tài, 8760 giờ sung túc, 525600 phút thành công, 31536000 giây vạn sự như ý."; break;
    case(17):$loichuc = "Sang năm mới chúc ".$name." có một bầu trời sức khoẻ, một biển cả tình thương, một đại dương tình cảm, một điệp khúc tình yêu, một người yêu chung thủy, một tình bạn mênh mông, một gia đình thịnh vượng. "; break;
    case(19): $loichuc = "Đong cho đầy hạnh phúc. Gói cho trọn lộc tài. Giữ cho mãi an khang. Thắt cho chặt phú quý. Cùng chúc nhau như ý. Hứng cho tròn an khang. Chúc năm mới bình an. Cả nhà đều sung túc. Chúc mừng năm mới!."; break;
    case(20): $loichuc= "Chúc năm ".$name." giàu to; Sức khỏe chẳng lo; Buồn bực xếp xó; Khó khăn chuyện nhỏ; Việc chạy ro ro; Không còn nhăn nhó; Muốn gì được đó!"; break;
    case(21): $loichuc = "Năm Tuất sắp đến\nChúc bạn đáng mến\nSự nghiệp tiến lên\nGặp nhiều điều hên\nRước nhiều may mắn."; break;
    }
    $data = array("url" => $img, "caption" => $loichuc);
    $ch = curl_init("https://graph.facebook.com/v3.0/".$ID."/photos?&access_token=".$token."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_exec($ch);
    curl_close($ch);
} 

function logs($data) {
	$fp = fopen('log.txt', "a");
	if ($fp) {
	        fwrite($fp, $data);
	}
	fclose($fp);
}





?>
