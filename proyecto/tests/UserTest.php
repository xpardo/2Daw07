<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use My\User;



final class UserTest extends TestCase
{
    public function TestUser():User
    {
        $cooki=user::isAuthenticated();
        $cook = false;

        if($cooki==1){
            $cook=true;
        }else{
            $cook=false;
        }
        $this->assertEquals($cook);

        $db->close();




    }
}










?>