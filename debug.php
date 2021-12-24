<?php
    require_once('_class/Database.class.php');
    $DB = new Database;
    $DB->Connect();

    //$dados['user_id'] = '17';
    $dados['user_nome'] = "Kelen Matos";

    //$DB->Create('users',$dados);
    //$DB->Update('users',$dados,"WHERE user_id = '17'");
    // $DB->Delete('users',"WHERE user_id IN(2,4)");
    //$DB->SQL("SELECT * FROM users");
    $DB->Read('users',"WHERE user_id = '3'");
    $res = $DB->GetResult();
    print_r($res);