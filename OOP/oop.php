<?php

class Team{
    private $name;
    private $town;
    private $league;

    public function get_name(){
       return $this->name;
    }

    public function get_town(){
       return $this->town;
    }

    public function get_league(){
       return $this->league;
    }

    public function set_name($name){
        $this->name = $name;
    }
    
    public function set_town($town){
        $this->town = $town;
    }

    public function set_league($league){
        $this->league = $league;
    }
}

class member{
    private $ID;
    private $name;
    private $salary;

    public function __construct($ID,$name,$salary){
           $this->ID =$ID;
           $this->name =$name;
           $this->salary =$salary;
    }

    public function get_name(){
      return $this->name;
    }

    public function get_ID(){
       return $this->ID;
    }

    public function get_salary(){
       return $this->salary;
    }

    public function set_name($name){
       $this->name = $name;
    }

    public function set_ID($ID){
       $this->ID = $ID;
    }

    public function set_salary($salary){
       $this->salary = $salary;
    }
}

class coach extends member{
    private $experience;
    private $cups=0;

    public function __construct($ID,$name,$salary,$experience,$cups){
      parent::__construct($ID,$name,$salary);
      $this->experience = $experience;
      $this->cups = $cups;
    }

    public function get_experience(){
       return $this->experience;
    }

    public function get_cups(){
       return $this->cups;
    }

    public function set_experience($experience){
         $this->experience = $experience;
    }

    public function set_cups($cups){
         $this->cups = $cups;
    }
}

class player extends member{
    private $number;
    private $height;
    private $age;
    public $goals = 0;
    public $coach = null;
 
    public function __construct($ID,$name,$salary,$number,$height,$age,$coach){
      parent::__construct($ID,$name,$salary);
      $this->number = $number;
      $this->height = $height;
      $this->age = $age;
      $this->coach = $coach;
    }

    public function get_number(){
      return $this->number;
   }

   public function get_height(){
      return $this->height;
   }

   public function get_age(){
      return $this->age;
   }

   public function set_number($number){
        $this->number = $number;
   }

   public function set_height($height){
        $this->height = $height;
   }

   public function set_age($age){
        $this->age = $age;
   }
   
   public function score(){
      $this->goals++;
      if($this->goals == 10){
         $cups_won = $this->coach->get_cups();
         $cups_won++;
         $this->coach->set_cups($cups_won);
         $this->goals = 0;
      }
   }

}

$coach2 = new coach(998,"koeman",72900,7.2,3);
$coach1 = new coach(576,"xavi",40000,6.9,0);
$player1 = new player(798,"adama traore",12000,11,1.78,26,$coach1);
$player2 = new player(138,"pedri gonzales",46600,16,1.74,19,$coach2);



   for($i=0;$i<20;$i++){
      $player1->score();
   }

   for($i=0;$i<30;$i++){
      $player2->score();
   }
   
   
   // printf("XAVI : ".$coach1->get_cups()."\n");
   // print("KOEMAN : ".$coach2->get_cups());
   echo '<pre>';
   print_r($coach1);
   print_r($coach2);
?>