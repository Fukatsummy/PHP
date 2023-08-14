<?php

abstract class Fighter {
    public $name; //это имя бойца, которое будет присвоено свойству $name.
    public $hp;  //то количество очков здоровья (HP), которые будут присвоены свойству $hp.
    public $power; //это сила атаки (power), которая будет присвоена свойству $power.

    function __construct($name,$hp,$power){
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
    }
    //Функция getDamage уменьшает hp бойца на заданное значение урона.
    function getDamage($damage){
        $this->hp -= $damage;

    }
    //пример функции speak(), которая может быть использована для всех персонажей:
    function speak($message, Fighter $any) {
        echo" <br>".$this->name." говорит ".$any->name.":".$message;
    } 
   
    abstract function baseAttack(Fighter $opp);//Функция baseAttack принимает объект Fighter в качестве параметра и уменьшает его здоровье, атакуя текущей мощностью бойца.
}
class Archer extends Fighter {
    //реализация абстрактного метода
    function baseAttack(Fighter $target){
        echo "<br>Выстрел из лука в ".$target->name;
    }
}

class Wizard extends Fighter {
    //реализация абстрактного метода
    function baseAttack(Fighter $target){
        echo " <br>".$target->name."Получил огненным шаром по макушке";
    }
}

$a1 = new Archer("Robin",400,30);
$a2 = new Wizard ("Vilgelm",230,50);
$a2->baseAttack($a1);
$a1->baseAttack($a2);
$a2->speak("Привет ВОИН!", $a1);// `$a2` в качестве второго аргумента при вызове метода `speak` у `$a1`, чтобы передать объект типа `Fighter` вторым аргументом. 
$a1->speak("Я Робин Гуд!", $a2);//В функции `speak` мы используем свойство `a1(name)` объектов для формирования сообщения. 



interface reptile{
    function poisonbite($target);
    function hypnotize($target);
}

class Snake extends Fighter implements reptile{
    function poisonbite($target){
        echo "<br>".$target->name." отравлен и теряет здоровье каждую секунду";
    }
    function hypnotize($target){
        echo "<br>".$target->name." загипнотизирован и не способен сражаться";
    }
   // Данная функция осуществляет атаку бойца на оппонента. Она принимает в качестве 
    //параметра объект оппонента и наносит урон, равный силе атаки первого бойца. После этого выводит сообщение о том, что первый боец атаковал второго бойца и нанес определенный урон.
    function baseAttack(Fighter $target){
        echo "<br>".$target->name." укушен змеей";
    }
 }

 // создаем объект класса Snake
$snake = new Snake("Snake",100,20);
// Змея атакует стрелка (а1)
$snake->poisonbite($a1);
$snake->hypnotize($a1);
$snake->baseAttack($a1);

trait Healing {
    
    public function usePotion(){
        $this->hp += 30;
    } 
}
// включим трейт в класс
class Palladin extends Fighter {
    use Healing;
    //реализация абстрактного метода
    function baseAttack(Fighter $target){
        echo " <br>".$target->name."Получил святой дубиной ";
    }
}
$palladin = new Palladin("HolyMan",500,30);
$snake->poisonbite($palladin);
$palladin->usePotion();
?>