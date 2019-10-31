<!-- PHP constant
<?php
class Welcome {
	const GREET = 'Hello World';
	public function greet() {
		echo self::GREET;
	}
}
$welcome = new Welcome();
$welcome -> greet();

echo "<br>";
echo Welcome::GREET;
?> -->

<!-- PHP autoloading
<?php
// file Nguoilon.php
	class NguoiLon {
		public function __construct() {
			echo 'Class NguoiLon';
		}
	}
	// file TreCon.php
	class TreCon {
		public function __construct() {
			echo 'Class TreCon';
		}
	}
	C1:
	//Nhúng file ConNguoi
	include_once 'NguoiLon.php';
	//Nhúng file ConNguoi
	include_once 'TreCon.php';

	//Khởi tạo 2 class
	$nguoilon = new NguoiLon();
	//Kết Quả: Class NguoiLon
	$trecon = new TreCon();
	//Kết Quả: Class TreCon

	C2:
	//khai báo hàm __autoload
	function __autoload($className) {
		//kiểm tra xem file tồn tại không
		if(file_exists($className . '.php')) {
			//Nếu tồn tại thì nhúng file vào.
			include_once $className . '.php';
		}
	}
	//Khởi tạo 2 class
	$nguoilon = new NguoiLon();
	//Kết Quả: Class NguoiLon
	$trecon = new TreCon();
	//Kết Quả: Class TreCon

	C3:
	// file autoload.php
	spl_autoload_register(function($className) {
		$file = $className . '.php';
		if (file_exists($file)) {
			include $file;
		}
	});
	// file usage.php
	include 'autoload.php';
	//Khởi tạo 2 class
	$nguoilon = new NguoiLon();
	//Kết Quả: Class NguoiLon
	$trecon = new TreCon();
	//Kết Quả: Class TreCon
?> -->

<!-- PHP autoloading cải tiến
VD1:
	Kết cấu:
	src/
		Fruits/
			Apple.php
			Orange.php
			Banana.php
		App.php
	includes/
		autoload.php
	app.php
<?php
	// include/autoload.php
	spl_autoload_register(function($className) {
		$file = dirname(__DIR__) . '\\src\\' . $className . '.php';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
		echo $file;
		if (file_exists($file)) {
			include $file;
		}
	});
	// app.php
	include_once 'includes/autoload.php';
	// freely use the classes
	$app = new App();
	$apple = new Fruits\Apple();
	$orange = new Fruits\Orange();
	$banana = new Fruits\Banana();
?>
VD2:
	Kết cấu:
	src/
		classes/
			Myclass.php
	includes
	index.php
<?php
	// nhiều hàm callback
	$autoloadIncludes = function ($classname) {
		$filename = __DIR__ . '/includes/' . $classname . '.php';
		echo 'Try to load ' . $filename . PHP_EOL;
		if (file_exists($filename)) {
			include $filename;
		}
	};
	$autoloadClasses = function ($classname) {
		$filename = __DIR__ . '/classes/' . $classname . '.php';
		echo 'Try to load ' . $filename . PHP_EOL;
		if (file_exists($filename)) {
			include $filename;
		}
	};
	spl_autoload_register($autoloadIncludes);
	spl_autoload_register($autoloadClasses);
	$myClass = new MyClass;
?> -->

<!-- PHP visibility
VD1: xác thực, hạn chế dữ liệu
<?php
	class House {
		private $color;
		private $allowedColors = ['black', 'blue', 'red', 'green'];
		public function setColor($color) {
			// Black to black (lowercase)
			$color = strtolower($color);
			if (in_array( $color, $this -> allowedColors )) {
				$this -> color = $color;
			}
		}
		public function getColor() {
			if ($this -> color) {
				return $this -> color;
			} else {
				return 'No color is set. May be you have set a color which is not allowed';
			}
		}
	}
	$house1 = new House();
	$house1 -> setColor('black');
	echo $house1 -> getColor();
	echo '<br>'; 
	$house2 = new House();
	$house2 -> setColor('yellow'); 
	echo $house2 -> getColor();
?>
VD2: keep private things private
<?php
	class House {
		public function paint($color) {
			$this -> takeBrush();
			$this -> mixPaint($color);
			$this -> startPainting();
		}
		private function takeBrush {

		}
		private function mixPaint($color) {

		}
		private function startPainting() {

		}
	}
?> -->

PHP inherittance
VD1: public / protect 
<?php
	class Person {
		public $name;
		public $age;
		public function __construct($name, $age) {
			$this -> name = $name;
			$this -> age = $age;
		}
		public function introduce() {
			echo "My name is {$this -> name}. My age is {$this -> age}";
		}
	}
	class Tom extends Person {
		public function sayHello() {
			echo "Hello, World <br>";
		}
	}
	$tom = new Tom('Tom', 29);
	$tom -> sayHello();
	$tom -> introduce();
?>

<?php
	class ParentClass {
		protected $protectedProperty = 'Protected';
		private $privateProperty = 'Private';
		protected function protectedMethod() {
			echo $this -> protectedProperty;
		}
		private function privateMethod() {
			// do sth
		}
	class Child extends ParentClass {
		public function doSomething() {
			$this -> protectedMethod();
		}
	}
	$child = new Child();
	$child -> doSomething();
?>
VD2: ghi đè
<?php
	class Person {
		public $name;
		public $age;
		public function __construct($name, $age) {
			$this -> name = $name;
			$this -> age = $age;
		}
		public function introduce() {
			echo "My name is {$this -> name}. My age is {$this -> age}";
		}
	}
	class Tom extends Person {
		public $school;
		public function __construct($name, $age, $school) {
			$this -> name = $name;
			$this -> age = $age;
			$this -> school = $school;
		}
		public function introduce() {
			echo "My name is {$this -> name}. My age is {$this -> age}. My school is {$this -> school}";
		}
	}
	$tom = new Tom('Tom', 29, 'Foothill School');
	$tom -> introduce();
?>
VD3: gọi phương thức cha 
<?php
	class Person {
		public $name;
		public $age;
		public function __construct($name, $age) {
			$this -> name = $name;
			$this -> age = $age;
		}
		public function introduce() {
			echo "My name is {$this -> name}. My age is {$this -> age}";
		}
	}
	class Tom extends Person {
		public $school;
		public function __construct($name, $age, $school) {
			parent::__construct($name, $age);
			$this -> school = $school;
		}
		public function introduce() {
			echo "My name is {$this -> name}. My age is {$this -> age}. My school is {$this -> school}";
		}
	}
	$tom = new Tom('Tom', 29, 'Foothill School');
	$tom -> introduce();
?>
VD4: dùng "final ngăn chặn kế thừa giai cấp / ngăn chặn ghi đè"
<?php
	final class NonParent {
		
	}
	class Child extends NonParent {
		
	}
?>

<?php
	class ParentClass {
		final public function myMethod() {
			// do sth
		}
	}
	class Child extends ParentClass {
		public function myMethod() {
			// do sth
		}
	}
?>

PHP object 
<?php
	class House {
		public $primaryColor = 'black';
		public $secondaryColors = [
			'bathroom' => 'white',
			'bedroom' => 'light pink',
			'kitchen' => 'light blue'
		];
	}
	$myHouse = new House();
	$friendHouse = new House();
	echo $myHouse -> primaryColor;
	echo $friendHouse -> primaryColor;
	echo $myHouse -> primaryColor = 'red';
	echo $friendHouse -> primaryColor = 'yellow';
?>

PHP abstract
<?php
	abstract class Person {
		public $name;
		public function __construct($name) {
			$this -> name = $name;
		}
		abstract public function greet() : string;
	}
	class Programmer extends Person {
		public function greet() : string {
			return "Hello World from " . $this -> name;
		}
	}
	class Student extends Person {
		public function greet() : string {
			return "Howdy! I'm " . $this -> name;
		}
	}
	class Teacher extends Person {
		public function greet() :string {
			return "Good morning dear students";
		}
	}
	$programmer = new Programmer('John');
	echo $programmer -> greet();
	echo "<br>";
	$student = new Student('Doe');
	echo $student -> greet();
	echo "<br>";
	$teacher = new Teacher('Mary');
	echo $teacher -> greet();
?>

PHP interface / implements
VD1: interface
<?php
	Interface Person {
		public function __construct($name);
		public function greet() : string;
	}

	class Programmer implements Person {
		public $name;
		public function __construct($name) {
			$this -> name = $name;
		}
		public function greet() : string {
			return "Hello World from " . $this -> name;
		}
	}
	$programmer = new Programmer('John');
	echo $programmer -> greet();
?>
VD2: thực hiện nhiều interface
<?php
	Interface MyInterface1 {
		public function myMethod1();
	}
	Interface MyInterface2 {
		public function myMethod2();
	}
	class MyClass implements MyInterface1, MyInterface2 {
		public function myMethod1() {
			echo "Hello ";
		}
		public function myMethod2() {
			echo "World";
		}
	}
	$obj = new MyClass();
	$obj -> myMethod1();
	$obj -> myMethod2();
?>
VD3: kế thừa và thực hiện
<?php
	Interface MyInterface {
		public function write();
	}
	class ParentClass {
		public $name;
		public function __construct($name) {
			$this -> name = $name;
		}
	}
	class ChildClass extends ParentClass  implements MyInterface {
		function write() {
			echo $this -> name;
		}
	}
	$child = new ChildClass('Hyvor');
	$child -> write();
?>
VD4: kế thừa nhiều interface
<?php
	Interface MyInterface1 {
		public function myMethod1();
	}
	Interface MyInterface2 extends MyInterface1 {
		public function myMethod2();
	}
	class MyClass1 implements MyInterface1 {
		public function myMethod1() {

		}
	}
	class MyClass2 implements MyInterface2 {
		public function myMethod1() {

		}
		public function myMethod2() {

		}
	}
?>

PHP overloading
<?php
	public class Demo {
		public int Cong(int x, int y, int z) {
		  return x + y + z;
		}
	  
		public string Cong(string s1, string s2) {
		  return s1.Concat(s2);
		}
	  }
?>

PHP Magic method
__construct():
VD1:
<?php
	class Tweet {
		public function __construct($id, $text) {
		$this->id = $id;
		$this->text = $text;
		}
	}
	$tweet = new Tweet(123, 'Hello world');
?>
VD2:
<?php
	class Entity {
		protected $meta;
		public function __construct(array $meta) {
			$this->meta = $meta;
		}
	}
	class Tweet extends Entity {
		protected $id;
		protected $text;
		public function __construct($id, $text, array $meta) {
			$this->id = $id;
			$this->text = $text;
			parent::__construct($meta);
		}
	}
?>

__destruct():
<?php
	class Tweet {
		public function __construct($id, $text) {
			$this->id = $id;
			$this->text = $text;
		}
		public function __destruct($id, $text) {
			$this->id = $id;
			$this->text = $text;
		}
	}
	$tweet = new Tweet(123, 'Hello world');
?>

__get():
VD1:
<?php 
	class ConNguoi {
		public $name = 'Nguyễn Trung Anh';
		private $age = 20;
		public function __get($key) {
			die('Phương thức __get() được gọi');
		}
	}
	$connguoi = new ConNguoi();
	echo $connguoi->name;
	//Kết quả: Nguyễn Trung Anh
	$connguoi->age;
	//Kết quả: Phương thức __get() được gọi
?>
VD2:
<?php
	class ConNguoi {
		private $name = "Nguyễn Trung Anh";
		public function __get($key) {
			if (property_exists($this, $key)) {
				return $this->$key;
			} else {
				die('Không tồn tại thuộc tính');
			}
		}
		public function getName() {
			echo $this->name;
		}
	}
	$connguoi = new ConNguoi();
	echo $connguoi->name;
	//Kết quả: Nguyễn Trung Anh
	$connguoi->age;
	//Kết quả: Không tồn tại thuộc tính
?>

__set():
VD1:
<?php
	class ConNguoi {
		private $name;
		public function __set($key, $value) {			
			if (property_exists($this, $key)) {
				$this->$key = $value;
			} else {
				die('Không tồn tại thuộc tính');
			}
		}
		public function getName() {
			echo $this->name;
		}
	}
	$connguoi = new ConNguoi();
	$connguoi->name = "Nguyễn Trung Anh";
	$connguoi->getName();
	//Kết quả: Nguyễn Trung Anh
	$connguoi->age = 20;
	//Kết quả: Không tồn tại thuộc tính
?>
VD2:
<?php
	class ConNguoi {
		public $name;
		public function __set($key, $value) {
			die('Phương thức __set() được gọi');
		}
		public function getName() {
			echo $this->name;
		}
	}
	$connguoi = new ConNguoi();
	$connguoi->name = "Nguyễn Trung Anh";
	$connguoi->getName();
	//Kết quả: Nguyễn Trung Anh
	$connguoi->age = 20;
	//Kết quả: Phương thức __get() được gọi
?>

__isset():
<?php
	class ConNguoi {
		private static $name;
		public function __isset($name) {
			echo 'Bạn vừa kiểm tra thuộc tính: ' . $name;
		}
	}
	$connguoi = new ConNguoi();
	isset($connguoi->name);
	//Kết quả: Bạn vừa kiểm tra thuộc tính: name
	empty($connguoi->name);
	//Kết quả Bạn vừa kiểm tra thuộc tính: name
	isset($connguoi->age);
	/*kiểm tra thuộc tính không tồn tại trong đối tượng*/
	//Kết quả: Bạn vừa kiểm tra thuộc tính: age
?>

__unset():
<?php
	class ConNguoi {
		private $name;
		public function __unset($name) {
			echo 'Bạn vừa hủy thuộc tính: ' . $name;
		}
	}
	$connguoi = new ConNguoi();
	unset($connguoi->name);
	//Kết quả: Bạn vừa hủy thuộc tính: name
	unset($connguoi->age);
	/* unset thuộc tính không tồn tại trong đối tượng*/
	//Kết quả: Bạn vừa hủy thuộc tính: age
?>

__toString():
<?php
	class ConNguoi {
		private $name = 'Nguyễn Trung Anh';
		private $age = 20;
		public function __toString() {
			return 'Phương thức __toString() được gọi';
		}
	}
	echo new ConNguoi();
	//Kết quả: Phương thức __toString() được gọi
?>

__sleep():
<?php
	class ConNguoi {
		private $name = 'Nguyễn Trung Anh';
		private $age = 20;
		public function __sleep() {
			return array('name');
		}
	}
	echo serialize(new ConNguoi());
	//Kết quả: O:8:"ConNguoi":1:{s:14:"ConNguoiname";s:18:"Nguyễn Trung Anh";}
?>

__wakeup():
<?php
	class ConNguoi {
		private $name = 'Nguyễn Trung Anh';
		private $age = 20;
		public function __sleep() {
			return array('name');
		}
		public function getName() {
			echo $this->name;
		}
		/* gọi hàm getName khi unserialize() */
		public function __wakeup() {
			$this->getName();
		}
	}
	unserialize(serialize(new ConNguoi()));
	//Kết quả: Nguyễn Trung Anh.
?>

__call():
<?php
	class ConNguoi {
		private $name = "Nguyễn Trung Anh";
		private $age = 22;
		public function __call($methodName, $arguments) {
			echo 'Bạn vừa gọi phương thức: ' . $methodName . ' và có các tham số: ' . implode('-', $arguments);
		}
		private function getInfo() {
			echo $this->name . ' + ' . $this->age;
		}
	}
	$connguoi = new ConNguoi();
	$connguoi->getInfo();
	//Kết quả: Bạn vừa gọi phương thức: getInfo và có các tham số:
	$connguoi->getInfo('name', 'age');
	//Kết quả: Bạn vừa gọi phương thức: getInfo 
	//và có các tham số: Bạn vừa gọi phương thức: getInfo và có các tham số: name-age
?>

__clone(): có sử dụng từ khóa clone 
<?php
	class ConNguoi {
		public $name = "Nguyễn Trung Anh";
		public $age = 21;
		public function __clone() {
			echo 'Phương thức __clone() được gọi';
		}
	}
	$connguoi = new ConNguoi();
	$connguoi2 = clone $connguoi;
	echo $connguoi2->name;
	// Nguyễn Trung Anh
?>

__invoke():
VD1: không tham số
<?php
	class ConNguoi {
		private $name = 'Nguyễn Trung Anh';
		private $age = 20;
		public function __invoke() {
			echo 'Phương thức __invoke() được gọi';
		}
	}
	$congnuoi = new ConNguoi();
	$congnuoi();
	//Kết quả: Phương thức __invoke() được gọi
?>
VD2: có tham số
<?php
	class ConNguoi {
		private $name = 'Nguyễn Trung Anh';
		private $age = 20;
		public function __invoke($name) {
			if ($name === 'name') {
				echo $this->name;
			}
		}
	}
	$congnuoi = new ConNguoi();
	$congnuoi('name');
	//Kết quả: Nguyễn Trung Anh
?>
