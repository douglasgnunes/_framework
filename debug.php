<?php
    require_once('_class/Database.class.php');
    $DB = new Database;
    $DB->Connect();

    $dados['user_id'] = '17';
    $dados['user_nome'] = "Kelen";

    $DB->Create('users',$dados);

    $res = $DB->GetResult();
    print_r($res);