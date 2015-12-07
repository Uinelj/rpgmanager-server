<!DOCTYPE html>
<html>
<?php
  //$config = include('config.php');
  require_once('./user.php');
  require_once('./io.inc.php');

?>
  <head>
    <title>RPGManager</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./style.css" type="text/css" media="screen">
    <meta name="viewport" content="width=device-width" content="initial-scale=1">
  </head>
  <body>
    <header>
      <h1><a href="./index.php">RPGManager</a></h1>
    </header>
  </body>
<h1>Bienvenu mj ^^</h1>

<h2>Liste des comptes</h2>
  <ul>
  <?php

    $users = array_diff(scandir("./users/"), array('.', '..'));
    foreach ($users as $user){
      $curr = load($user);
      echo '<li><a href=index.php?id=' . $curr->getId() . '>' . $curr->getName() . '</a></li>';
    }
  ?>
</ul>

<?php
  if($_GET['id'] != NULL){
    $user = load($_GET['id']);
    ?>
    <table>
      <tr>
        <th>Full Name</th>
        <th>Alignment</th>
        <th>Race</th>
        <th>Class</th>
        <th>Str</th>
        <th>Dex</th>
        <th>Con</th>
        <th>Intel</th>
        <th>Wis</th>
        <th>Cha</th>
        <th>Max. HP</th>
        <th>Damage dice</th>
        <th>Armour</th>
        <th>Hp</th>
        <th>Level</th>
        <th>Xp</th>
        <th>Bonds</th>
        <th>Gear</th>
        <th>Moves</th>
      </tr>
      <tr>
        <td><?=$user->getName() ?></td>
        <td><?=$user->getAlign() ?></td>
        <td><?=$user->getRace() ?></td>
        <td><?=$user->getClass() ?></td>
        <td><?=$user->getStr() ?></td>
        <td><?=$user->getDex() ?></td>
        <td><?=$user->getCon() ?></td>
        <td><?=$user->getIntel() ?></td>
        <td><?=$user->getWis() ?></td>
        <td><?=$user->getCha() ?></td>
        <td><?=$user->getMaxhp() ?></td>
        <td><?=$user->getDmg() ?></td>
        <td><?=$user->getArmour() ?></td>
        <td><?=$user->getHp() ?></td>
        <td><?=$user->getLvl() ?></td>
        <td><?=$user->getXp() ?></td>
        <td><?=$user->getBonds() ?></td>
        <td><?=$user->getGear() ?></td>
        <td><?=$user->getMoves() ?></td>
      </tr>
    </table>

    <?php echo '<form action="./handleUpdateRequest.php?id=' . $user->getId() . '" method="post">' ?>
      <select  name="field">
        <option value='align'>align</option>
        <option value='race'>race</option>
        <option value='class'>class</option>
        <option value='str'>str</option>
        <option value='dex'>dex</option>
        <option value='con'>con</option>
        <option value='intel'>intel</option>
        <option value='wis'>wis</option>
        <option value='cha'>cha</option>
        <option value='maxhp'>maxhp</option>
        <option value='dmg'>dmg</option>
        <option value='armour'>armour</option>
        <option value='hp'>hp</option>
        <option value='lvl'>lvl</option>
        <option value='xp'>xp</option>
        <option value='bonds'>bonds</option>
        <option value='gear'>gear</option>
        <option value='moves'>moves</option>
      </select>
      <textarea name="value" placeholder="New value"></textarea>
      <input type="submit" value="Update">
    </form>

    <?php
    //print_r($user->getStr());
  }
?>

<h2>Créer un compte</h2>

<form action="./action.php?a=createUser" method="post">
  <input class="inputstat" type="text" name="name" placeholder="Nickname">
  <input class="inputstat" type="text" name="align" placeholder="Alignment">
  <input class="inputstat" type="text" name="race" placeholder="Race">
  <input class="inputstat" type="text" name="class" placeholder="class">
  <input class="inputstat" type="number" name="str" placeholder="Strength">
  <input class="inputstat" type="number" name="dex" placeholder="Dexterity">
  <input class="inputstat" type="number" name="con" placeholder="Constitution">
  <input class="inputstat" type="number" name="intel" placeholder="Intelligence">
  <input class="inputstat" type="number" name="wis" placeholder="Wisdom">
  <input class="inputstat" type="number" name="cha" placeholder="Charism">
  <input class="inputstat" type="number" name="maxhp" placeholder="Maximum HP">
  <input class="inputstat" type="text" name="dmg" placeholder="Damage dice">
  <input class="inputstat" type="number" name="armour" placeholder="Armor">
  <input class="inputstat" type="number" name="hp" placeholder="Starting HP">
  <input class="inputstat" type="number" name="lvl" placeholder="Level">
  <input class="inputstat" type="number" name="xp" placeholder="XP">
  <textarea placeholder="Bonds" class="inputstat" name="bonds" placeholder="Bonds"></textarea>
  <textarea name="gear" class="inputstat" placeholder="Gear"></textarea>
  <textarea name="moves" class="inputstat" placeholder="Moves"></textarea>

  <input type="submit" value="Submit">
</form>

</html>
