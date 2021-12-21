<?php

namespace My;

class User
{
    const token = 'session_token';
    

    public function getId():int
    {
      
        Helpers::log()->debug("retorna el valor de la variable de sessió uid");
        $db = new Database();
        $uid = $user["id"]=0;
        $sql="SELECT * from users where id=$uid";
        Helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt->id == 1){
            $uid = $stmt->fetch_assoc();
        }
        return $uid;
        Helpers::log()->debug($uid);


    }

    public function getToken():string
    {
        Helpers::log()->debug("etorna el valor de la cookie de sessió");   
        $db = new Database();
        $tok=self::token;
        $sql="SELECT * from user_tokens where token=$tok";
        helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt -> token){
            $tok = $stmt->fetch_assoc();
        }
        Helpers::log()->debug($tok);
        
    }

    public function isAuthenticated():bool
    {
        $cook=false;
        Helpers::log() ->debug("retorna si existeix la cookie de sessió");
        $db = new Database();
        $tok=self::token;
        $sql="SELECT * from user_token where token=$tok";
        helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if($stmt==1){
            $cook=true;
        }

        return $cook;
    }




}





?>