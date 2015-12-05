<?php
  require_once('user.php');
  require_once('io.inc.php');
?>
<h1>Bienvenu mj ^^</h1>
<?php
  if($_POST['result'] != NULL){
    echo "<p>" . $_POST['result'] . "</p>";
  }
?>
<h2>Créer un compte</h2>

<form action="action.php?a=createUser" method="post">
  Nickname<br>
  <input type="text" name="name">
  <br>
  Alignment<br>
  <input type="text" name="align">
  <br>
  Race<br>
  <input type="text" name="race">
  <br>
  Class<br>
  <input type="text" name="class"><br />
  <br>
  Strength<br />
  <br /><input type="number" name="str"><br />
  Dexterity<br />
  <br /><input type="number" name="dex"><br />
  Constitution<br />
  <br /><input type="number" name="con"><br />
  Intelligence<br />
  <br /><input type="number" name="intel"><br />
  Wisdom<br />
  <br /><input type="number" name="wis"><br />
  Charism<br />
  <br /><input type="number" name="cha"><br />
  Max. HP<br />
  <br /><input type="number" name="maxhp"><br />
  Damage dice<br />
  <br /><input type="text" name="dmg"><br />
  Armour<br />
  <br /><input type="number" name="armour"><br />
  HP<br />
  <br /><input type="number" name="hp"><br />
  Level<br />
  <br /><input type="number" name="lvl"><br />
  XP<br />
  <br /><input type="number" name="xp"><br />
  <br />
  Bonds<br>
  <textarea name="bonds">
  </textarea>
  <br>
  Gear<br>
  <textarea name="gear">
  </textarea>
  <br>
  Moves<br>
  <textarea name="moves">
  </textarea>
  <br>
  <br><br>
  <input type="submit" value="Submit">
</form>

<?php
  $user = new user(
    str_replace(' ', '', "Fluba"),
    "Fluba",
    "Neutral good",
    "Orc",
    "Warlock",
    "6",
    "4",
    "4",
    "12",
    "2",
    "4",
    "17",
    "d6",
    "1",
    "17",
    "1",
    "20");
  //store($user);
  //echo $user->setCha(4);
  //$user = load("Fluba");
  //print_r($user);
?>
