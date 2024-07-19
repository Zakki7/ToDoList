
<?php
//         $arr = array("Monday" => 'Kitchen',"Tuesday" => 'Bed',  4 => 'Wardrobe','Toilet','Yard');
//         $lis = $arr;
//         $key = array_keys($arr);

//         foreach($arr as $key => $value){
//                 echo $key.' '.$value.' <br> ';
//         }
//         // for ($i = 0; $i < count($key); $i++){
//         //         // if ($i == 2 or $i== 3) {
//         //         //         continue;
//         //         // }
//         //         echo $key[$i]. ' = '. $arr[$key[$i]] . " Today's <br>";
//         // }
//         // echo count($arr);
// 

// $arr = array('Zaki' => array('Monday' => 'job', 'Tuesday' => 'Uni', 'Wednesday' =>'off', 'Thursday' => 'job', 'Friday' => 'Uni'),
//              'Hadia' => array('Monday' => '', 'Tuesday' => 'Uni', 'Wednesday' =>'off', 'Thursday' => 'job', 'Friday' => 'Uni'));

//         foreach($arr as $value):
//         foreach($value as $key => $data):
//                 echo $data . $key . $value . '<br>';        
//         endforeach;
// endforeach;

//Type specifier

// $a = 123;
// $b = "Movies";
// $c = 20;
// //        printf("Watch Latet movies on %d %s only for %d $", $a, $b, $c);
// printf("%40d", 2345);
// function display()
// {
//         echo "Function";
// }
// display();

?>




<?php
//oops
class Ucl
{ //class
        public $Titles;
        public $Team;
        function Titles_won($won, $teams)
        {
                $this->Titles = $won;   //-> removes the need for $
                $this->Team = $teams;
                echo "Titles Won By " . $teams . " : " . $won;
        }
}
$Madrid = new Ucl(); //objects
$Madrid->Titles_won(15, 'Real Madrid');

class person
{
        public $ids;
        public $jobs;
        public $homes;
        function __construct($id, $job, $home)
        {
                $this->ids = $id;
                $this->jobs = $job;
                $this->homes = $home;

                echo '<br>' . $this->ids . ' ' . $this->jobs . ' ' . $this->homes;
        }
}

$per = new person(2, 'DAE Agent', 'LA');

//Single inheritance

class employee extends person
{
        public $salary;
        public $hours;
        public function __construct($id, $job, $home, $salary, $hours)
        {
                person::__construct($id, $job, $home);
                $this->salary = $salary;
                $this->hours = $hours;
        }
        function Display()
        {
                echo ' ' . $this->salary . ' ';
                echo ' ' . $this->hours . ' ';
        }
}
$emp = new employee(4, 'Marketing', 'Jt', 40000, 8);
$emp->Display();

//Multi Level Inheritance
class PLayer extends person
{
        public function __construct($id, $job, $home, $club,$rank)
        {
                person::__construct($id, $job, $home);
                $this->club = $club;
                $this->rank = $rank;
        }
}
class Rank extends PLayer{
        function __construct($id, $job, $home, $club, $rank){
                PLayer::__construct($id, $job, $home, $club,$rank);
                $this->id = $id;
                $this->job = $job;
                $this->home = $home;
                $this->rank = $rank;
                $this->club = $club;

                if($rank >= 90){
                        echo "<br> Player ID $id";
                        echo "<br> $job";
                        echo "<br> $home";
                        echo  "<br> Club : ", $club;
                        echo " <br> your rank value is: ", $rank;
                        echo "<br> Player is Top class";
                }
                else{
                        echo "<br> Player ID $id";
                        echo "<br> $job";
                        echo "<br> $home";
                        echo  "<br> Club : ", $club;
                        echo " <br> your rank value is: ", $rank;
                        echo "<br> Player is Top class";
                        echo "<br>Player is Good";
                }               

        }
}
$Rank = new Rank(1,'Footballer','Portugal','Real Madrid', 92);
$Rank = new Rank(2,'Footballer','Argentina','Atletico Madrid', 85);
$Rank = new Rank(3,'Footballer','Spain','Girona', 90);


//Heirarchal inheritance
class Netflix{
        public $profiles;
        public $Billing;
        public $reigon;
        private $accounts = 5; //Private access modifier
        public function __construct($profiles,$Billing, $reigon){
                $this->profiles = $profiles;
                $this->Billing = $Billing;
                $this->reigon = $reigon;
        }
        public function display(){
                echo $this->profiles .  ' ' . ' ' . $this->Billing . ' '. ' ' . $this->reigon ;  
        }

}
class Shows extends Netflix{
        public $shows;
        public $genre;
        public function __construct($profiles,$Billing, $reigon,$shows,$genre){
                Netflix::__construct($profiles,$Billing, $reigon);
                $this->shows = $shows;
                $this->genre = $genre;
        }
        public function display(){
                echo $this->profiles .  ' ' . ' ' . $this->Billing . ' '. ' ' . $this->reigon ;  
                echo $this->shows . ' ' . ' ' . $this->genre;
        }
}
class Movies {
        public $movies;
        public $genre;

        public $netflix;

        public function __construct(Netflix $netflix ,$movies, $genre){  //passing the object in parameter
                
                $this->movies = $movies;
                $this->genre = $genre;
                $this->netflix = $netflix;
        }
        public function display(){
                echo '<br>';
                echo $this->netflix->display();
                echo ' ' .$this->movies . ' ' . ' ' . $this->genre;
        }

}

$netflix = new Netflix('Sabeen' , '15$' , 'Pakistan');
$show = new Shows('Sabeen' , '15$' , 'Pakistan', 'Indian', 'Thriller');
$show->display();


$Movies = new movies($netflix, 'Hollywood', 'Rom-com');
$Movies->display();


// Const

class GOT{
    public const char= 102;
   function display(){
        echo '<br>' . self::char;
    }
}
$GOT = new GOT();
$GOT->display();

//abstract classes

abstract class car{
    public $name;
    function dis(){
        echo "R8 is the fastest";
    }
    abstract function types();

} 
class Audi extends car{

   function types(){
    echo "<br>No <br>";
    $this->dis();
   }
}
$audi = new Audi;
$audi->types();

//Static property self:: is used to access the static variable
//only static properties can be accesed in the static function  x $this->a x
class Fcc{
    public static $society = "Fdc";
    static function display($name){
        echo "<br>". Self::$society . ' : '. $name . "<br>";
    }
}


interface father{
        const a = 20;
        function display();

}
interface mother {
        const b = 30;
        function multi();
}
interface son extends father,mother{
        const c = 30;
        function sum();
}

class daughter implements son{
        public $value;
        function display(){
                echo "<br>". father::a ." " ;
        }
        function sum(){ 
                echo '<br>' . father::a + mother::b;
        }
        function multi(){}
}

$obj = new daughter;
$obj->display();
$obj->sum();

//Multi level inheritance *One class and Interfance* extends than implement


?>