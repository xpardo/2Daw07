<?php declare(strict_types=1);
 
use PHPUnit\Framework\TestCase;
use My\Helpers;
 
final class HelpersTest extends TestCase
{
  
   /* public function testExpectedText(): void 
   {
       $txt = Helpers::sayHello("08");
       $this->assertEquals("Hello 08", $txt);
   }
 */
    public function testhttp(): void 
    {
        $path="user/register.php";
        $txt = Helpers::url($path);
        $this->assertStringStartsWith("http:" , $txt);
        $this->assertStringEndsWith($path, $txt);
        $txt2 = Helpers::url($path,true);
        $this->assertStringStartsWith("https" , $txt2);
        $this->assertStringEndsWith($path ,$txt2);


    }
    
}
