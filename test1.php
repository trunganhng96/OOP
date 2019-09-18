<html>
  	<h1>Bài tập kế thừa lớp</h1>
   	<body>
       	<?php
        class People{  
			public $ten;
			public $tuoi;       
			public function getthongtin(){  
				 $this->ten=$_ten;
				 $this->tuoi=$_tuoi;
			}
		}
		class Person extends People{
			public function _getthongtin($_ten,$_tuoi){
				 $this->ten=$_ten;
				 $this->tuoi=$_tuoi;
		}
	}
			$ca_nhan = new Person();
			$ca_nhan->_getthongtin('TrungAnh','23');
			echo $ca_nhan->ten;
			echo '</br>';
			echo $ca_nhan->tuoi;	
       ?>
   	</body>
</html>