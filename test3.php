<html>
   <h1>Bài tập Lớp</h1>
   <body>
   
       <?php
        class PhepToan{  
          private $PhanTu1;
          private $PhanTu2;  
          public function PhepToan($_PhanTu1,$_PhanTu2){
            $this->PhanTu1 = $_PhanTu1;  
            $this->PhanTu2 = $_PhanTu2;  
          }  
          public function Cong(){  
            return $this->PhanTu1 + $this->PhanTu2;  
          }  
          public function Tru(){  
            return $this->PhanTu1 - $this->PhanTu2;  
          }  
          public function Nhan(){  
            return $this->PhanTu1 * $this->PhanTu2;  
          }  
          public function Chia(){
            return $this->PhanTu1 / $this->PhanTu2;
          }
        }   
        $PT = new PhepToan(13,10);   
        echo $PT->Cong(); 
        echo "<br>";
        echo $PT->Tru(); 
        echo "<br>";
        echo $PT->Nhan(); 
        echo "<br>";
        echo $PT->Chia();
       ?>
       
   </body>
</html>