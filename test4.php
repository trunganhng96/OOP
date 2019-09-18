<!DOCTYPE html>
<html>
<h1>Bài tập Chỉ định truy xuất</h1>
<body>
<?php
	class SieuNhan{
		public $ten;
		private $sucmanh;

		public function setsucmanh($n){
			if ($n<0) {
				$this->sucmanh = 0;
			}else{
				$this->sucmanh = $n;
			}
		}
		public function getsucmanh($bienhinh){
			if ($bienhinh == 1) {
				return $this->sucmanh;
			}else{
				return 0;
			}
		}
	}

	$Ironman= new SieuNhan();
	$Ironman->setsucmanh(100);
	echo $Ironman->ten = 'Người Sắt';
	echo '</br>';
	echo $Ironman->getsucmanh(1);

?>
</body>
</html>
