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
        // ...
       /*  $consulta  = "SELECT email,role_id FROM users WHERE username = 'admin'";
        $resultado = pg_query($consulta, $db); */

        $this->assertSame($db);
    }
 }
 

   ?>