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

        $sth = $db->prepare('SELECT email,role_id FROM users WHERE username = "admin"');
        $cuenta_col = $sth->columnCount();
        $this->assertEquals($cuenta_col, 1);
    }
 }
 
?>

