<?php
/*
  TODO: Throw error if we don't have all the data.
*/
class user{
  /* id of the user. Unique, is the nickname without spaces or casse. */
  private $id;
  /* nickname */
  private $name;
  private $align;
  private $race;
  private $class;
  /* Stats */
  private $str;
  private $dex;
  private $con;
  private $intel;
  private $wis;
  private $cha;
  private $maxhp;
  /* Vars */
  private $dmg;
  private $armour;
  private $hp;
  /* Xp stuff */
  private $lvl;
  private $xp;
  /* Misc */
  private $bonds;
  private $gear;
  private $moves;

  public function __construct($id, $name, $align, $race, $class, $str, $dex, $con, $intel, $wis, $cha, $maxhp, $dmg, $armour, $hp, $lvl, $xp, $bonds = NULL, $gear = NULL, $moves = NULL){
    $this->id = $id;
    $this->name = $name;
    $this->align = $align;
    $this->race = $race;
    $this->class = $class;
    $this->str = $str;
    $this->dex = $dex;
    $this->con = $con;
    $this->intel = $intel;
    $this->wis = $wis;
    $this->cha = $cha;
    $this->maxhp = $maxhp;
    $this->dmg = $dmg;
    $this->armour = $armour;
    $this->hp = $hp;
    $this->lvl = $lvl;
    $this->xp = $xp;
    if($bonds != NULL){
      $this->bonds = $bonds;
    }
    if($gear != NULL){
      $this->gear = $gear;
    }
    if($moves != NULL){
      $this->moves = $moves;
    }
  }

  public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getAlign(){
		return $this->align;
	}

	public function setAlign($align){
		$this->align = $align;
	}

	public function getRace(){
		return $this->race;
	}

	public function setRace($race){
		$this->race = $race;
	}

	public function getClass(){
		return $this->class;
	}

	public function setClass($class){
		$this->class = $class;
	}

	public function getStr(){
		return $this->str;
	}

	public function setStr($str){
		$this->str = $str;
	}

	public function getDex(){
		return $this->dex;
	}

	public function setDex($dex){
		$this->dex = $dex;
	}

	public function getCon(){
		return $this->con;
	}

	public function setCon($con){
		$this->con = $con;
	}

	public function getIntel(){
		return $this->intel;
	}

	public function setIntel($intel){
		$this->intel = $intel;
	}

	public function getWis(){
		return $this->wis;
	}

	public function setWis($wis){
		$this->wis = $wis;
	}

	public function getCha(){
		return $this->cha;
	}

	public function setCha($cha){
		$this->cha = $cha;
	}

	public function getMaxhp(){
		return $this->maxhp;
	}

	public function setMaxhp($maxhp){
		$this->maxhp = $maxhp;
	}

	public function getDmg(){
		return $this->dmg;
	}

	public function setDmg($dmg){
		$this->dmg = $dmg;
	}

	public function getArmour(){
		return $this->armour;
	}

	public function setArmour($armour){
		$this->armour = $armour;
	}

	public function getHp(){
		return $this->hp;
	}

	public function setHp($hp){
		$this->hp = $hp;
	}

	public function getLvl(){
		return $this->lvl;
	}

	public function setLvl($lvl){
		$this->lvl = $lvl;
	}

	public function getXp(){
		return $this->xp;
	}

	public function setXp($xp){
		$this->xp = $xp;
	}

	public function getBonds(){
		return $this->bonds;
	}

	public function setBonds($bonds){
		$this->bonds = $bonds;
	}

	public function getGear(){
		return $this->gear;
	}

	public function setGear($gear){
		$this->gear = $gear;
	}

	public function getMoves(){
		return $this->moves;
	}

	public function setMoves($moves){
		$this->moves = $moves;
	}

  function toArray(){
    return get_object_vars($this);
  }

  function updateField($field, $value){
    $meth = "set" . ucfirst($field);

    return $meth;
  }
}
?>
