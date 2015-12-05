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
  /* Automatic getters/setters */
  function __call($m,$p) {
            $v = strtolower(substr($m,3));
            if (!strncasecmp($m,'get',3))return $this->$v;
            if (!strncasecmp($m,'set',3)) $this->$v = $p[0];
  }

  function toArray(){
    return get_object_vars($this);
  }

  function updateField($field, $value){
    return call_user_func("set" . ucfirst($field), $value);
  }
}
?>
