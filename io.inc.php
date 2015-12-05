<?php
  function createFolder(){
    return mkdir("./users/");
  }

  function store($user){
    $f = fopen("./users/" . $user->getId(), "w");
    if($f == false){
      return false;
    }
    $ser = serialize($user);
    if(fwrite($f, $ser) == false){
      return false;
    }
    return true;
  }

  function load($id){
    $f = fopen("./users/" . $id, "r");
    if($f == false){
      return false;
    }
    $unser = fgets($f);
    if($unser == false){
      return false;
    }
    return unserialize($unser);
  }

  function rm($id){
    return unlink("./users/" . $id);
  }
?>
