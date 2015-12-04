<?php
  require_once('user.php');
  require_once('io.inc.php');
  switch ($_GET['a']) {
    /*GM acions*/
    case 'createUser':
      $user = new user(
        str_replace(' ', '', $_POST['name']),
        $_POST['name'],
        $_POST['align'],
        $_POST['race'],
        $_POST['class'],
        $_POST['str'],
        $_POST['dex'],
        $_POST['con'],
        $_POST['intel'],
        $_POST['wis'],
        $_POST['cha'],
        $_POST['maxhp'],
        $_POST['dmg'],
        $_POST['armour'],
        $_POST['hp'],
        $_POST['lvl'],
        $_POST['xp'],
        $_POST['bonds'],
        $_POST['gear'],
        $_POST['moves']
      );
      if(load($user->getId()) != false){
        echo "ERR : Player already exists. :/";
        //header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
      }
      store($user);
      break;
    case 'rmUser':
      break;
    /**/
    case 'get':
      break;
    case 'update':
      break;
    default:
      echo "ERR : No actions given. :(";
      break;
  }
?>
