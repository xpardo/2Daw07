<?
final class DatabaseTest extends TestCase
{
   public function testConnection(): Database
   {
       $db = new Database();
       $this->assertIsObject($db);
       return $db;
   }
    /**
    * @depends testConnection
    */
    public function testStatements(Database $db): void
    {
<<<<<<< HEAD

        $sth = $db->prepare("SELECT email,role_id FROM users WHERE username = 'admin'");
        $cuenta_col = $sth->columnCount();
        $this->assertEquals($cuenta_col,1);
    }
 }


   ?>

 
=======
        // ...
       /*  $consulta  = "SELECT email,role_id FROM users WHERE username = 'admin'";
        $resultado = pg_query($consulta, $db); */

        $this->assertSame($db);
    }
 }
 

   ?>
>>>>>>> ab10b57c035eebb0b4ae17ae85c53b5f528af755
