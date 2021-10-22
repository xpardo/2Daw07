<?php declare(strict_types=1);
 
use PHPUnit\Framework\TestCase;
use My\Helpers;
 
final class HelpersTest extends TestCase
{
   public function testExpectedText(): void 
   {
       $txt = Helpers::sayHello("08");
       $this->assertEquals("Hello 08", $txt);
   }

    public function testhttp(): void 
    {
        $path="user/register.php";
        $txt = Helpers::ssl($ssl);
        $this->assertStringStartsWith("http" , $txt);
        $this->assertStringEndsWith($path);

        $this->assertStringStartsWith("https" , $txt);
        $this->assertStringEndsWith($path);

    }
    
}