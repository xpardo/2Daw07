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

        $sth = $dbh->prepare("SELECT email,role_id FROM users WHERE username = 'admin'");
    }
 }


   ?>

 