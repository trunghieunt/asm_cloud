<?php
  if (empty(getenv("DATABASE_URL"))){
      $pdo = new PDO('pgsql:host=ec2-174-129-241-14.compute-1.amazonaws.com;port=5432;dbname=dactdvvilpraas', 'vtxgsmmbwwvphq', 'be4521c7c9d016149f013a082acafa99f9ae520fc215a56d397c299b7deca5d1');
  }  else {
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
  }
?>