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
        // Check 1
        $stmt = $db->prepare("SELECT email,role_id FROM users WHERE username = ?");
        $stmt->execute(['admin']);
        $count = 0;
        foreach ($stmt as $row) {
            $count++;
        }
        $this->assertEquals($count, 1);

        // Check 2
        $this->expectException(Exception::class);
        $db->close();
        $stmt = $db->prepare("SELECT email,role_id FROM users WHERE username = ?");
        $stmt->execute(['admin']);
        }
    }
 
 
?>

