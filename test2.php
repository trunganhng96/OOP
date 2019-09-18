<!DOCTYPE html>
<html>
<h1>Bài tập mảng</h1>
<body>
	<?php
	$thong_tin= array( 	"ten"  			=>"TrungAnh", 
                 		"tuoi"    		=>"23", 
                 		"que_quan" 		=>"NgheAn", 
                 		"noi_o_hien_tai"=>"HaNoi");
    foreach($thong_tin as $tt=>$val){
        echo "$tt: $val"."</br>";
	}

	$thongtin=array(
		"HoTen"=>array(
			"Ho"=>"Nguyen",
			"Ten"=>"TrungAnh"
		),
		"Quequan"=>array(
			"Xa"=>"VoLiet",
			"Huyen"=>"ThanhChuong",
			"Tinh"=>"NgheAn"
		),
		"Noi_o_hien_tai"=>array(
			"Pho"=>"ThanhNhan",
			"Quan"=>"HBT",
			"Thanhpho"=>"HN"
		)
	);
	
	echo "HoTen: ".$thongtin['HoTen']['Ho'].$thongtin['HoTen']['Ten'].'<br>';
		
	 echo "Nguon_goc: ";
	 echo $thongtin['Quequan']['Tinh']."</br>";
	 echo "Sinh_song: ";
	 echo $thongtin['Noi_o_hien_tai']['Thanhpho'];

	

	?>

</body>
</html>