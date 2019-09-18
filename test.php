<!DOCTYPE html>
<html>
    <h1>Giải phương trình bậc hai = method POST</h1>
        <form method="post" action="">
            <input type="text" style="width: 20px" name="a" value=""/> x<sup>2</sup> +
            <input type="text" style="width: 20px" name="b" value=""/> x + 
            <input type="text" style="width: 20px" name="c" value=""/> = 0
            <br/><br/>
            <input type="submit" name="calculate" value="Giải phương trình" />
        </form>
    <body>
        <?php 
            $result = '';
            if (isset($_POST['calculate'])){
                $a = isset($_POST['a']) ? $_POST['a'] : '';
                $b = isset($_POST['b']) ? $_POST['b'] : '';
                $c = isset($_POST['c']) ? $_POST['c'] : '';
                $delta = ($b*$b) - (4*$a*$c);
 
            if ($delta < 0){
                $result = 'Phương trình vô nghiệm';
            }
            else if ($delta == 0){
                $result = 'Phương trình nghiệm kép: x1 = x2 = ' . (-$b/2*$a);
            }
            else {
                $result = 'Phương trình có hai nghiệm phân biệt: x1 = ' . ((-$b + sqrt($delta))/2*$a);
                $result .= ' , x2 = ' . ((-$b - sqrt($delta))/2*$a);
            }
            }
        ?>
        <?php echo $result; ?>
    </body>
</html>