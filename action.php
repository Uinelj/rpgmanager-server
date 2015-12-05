<?php
  require_once('user.php');
  require_once('io.inc.php');
  switch ($_GET['a']) {
    /*GM acions*/
    case 'createUser':
      if($_POST != NULL){
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
          $result['success'] = false;
          $result['msg'] = "Error : User already exists";
          $result['id'] = $_GET['id'];
        }else{
          store($user);
          $result['success'] = true;
        }
      }else{
        $result['success'] = false;
        $result['msg'] = "Error : no user given.";
      }
      break;
    case 'rmUser':
      if(!rm($_GET['id'])){
        $result['success'] = false;
        $result['msg'] = "Error : Unable to remove user";
        $result['id'] = $_GET['id'];
      }else{
        $result['success'] = true;
      }
      break;
    /**/
    case 'get': //TODO : utiliser call_user_func au lieu du tableau degeu
      if($_GET['id'] == NULL){
        $result['success'] = false;
        $result['msg'] = "Error : no user id given.";
      }else{
        $user = load($_GET['id']);
        if($user != false){
          $user = $user->toArray();
          $result['success'] = true;
          if($_GET['field'] != NULL){
            $result['field'] = $_GET['field'];
            if($user[$_GET['field']] == NULL){
              $result['success'] = false;
              $result['msg'] = "Error : Unknown field.";
            }else{
              $result['value'] = $user[$_GET['field']];
            }
          }else{
            $result['user'] = json_encode($user);
          }
        }else{
          $result['success'] = false;
          $result['msg'] = "Error : User could not be loaded";
          $result['id'] = $_GET['id'];
        }
      }
      break;
    case 'update':
      if($_GET['id'] == NULL){
        $result['success'] = false;
        $result['msg'] = "Error : no user id given.";
      }else if($_GET['field'] == NULL){
        $result['success'] = false;
        $result['msg'] = "Error : no field given.";
      }else{
        $user = load($_GET['id']);
        if($user == NULL){
          $result['success'] = false;
          $result['msg'] = "Error : User could not be found.";
          $result['id'] = $_GET['id'];
        }else{
          //TODO check if field exists
          $methodName = "set" . ucfirst($_GET['field']);
          $user->{$methodName}($_GET['value']);
          if(store($user) == false){
            $result['success'] = false;
            $result['msg'] = "Error : User could not be saved.";
            $result['id'] = $_GET['id'];
          }else{
            $result['success'] = true;
          }
        }
      }
      break;
    default:
      echo "ERR : No actions given. :(";
      break;
  }
  echo json_encode($result);
?>
