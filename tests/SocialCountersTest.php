<?php 

require_once __DIR__ . '/../vendor/autoload.php'; 

use EmersonBroga\SocialCounters;

class SocialCountersTest extends PHPUnit_Framework_TestCase {
	
  public function testFormatNumbersLowerThanOneThousand(){
  	$sc = new SocialCounters();
    
    $this->assertEquals($sc->format(1), '1');
    $this->assertEquals($sc->format(7), '7');
    $this->assertEquals($sc->format(10), '10');
    $this->assertEquals($sc->format(14), '14');
    $this->assertEquals($sc->format(99), '99');
    $this->assertEquals($sc->format(100), '100');
    $this->assertEquals($sc->format(101), '101');
    $this->assertEquals($sc->format(975), '975');
    $this->assertEquals($sc->format(999), '999');
  }

  public function testFormatThousands(){
    $sc = new SocialCounters();
    
    $this->assertEquals($sc->format(1000), '1K');
    $this->assertEquals($sc->format(1002), '1K+');
    $this->assertEquals($sc->format(7000), '7K');
    $this->assertEquals($sc->format(7500), '7.5K');
    $this->assertEquals($sc->format(7501), '7.5K+');
    $this->assertEquals($sc->format(999000), '999K');
    $this->assertEquals($sc->format(999001), '999K+');
    $this->assertEquals($sc->format(999999), '999.9K+');
    
  }

  public function testFormatMillions(){
    $sc = new SocialCounters();
    
    $this->assertEquals($sc->format(1000000), '1M');
    $this->assertEquals($sc->format(1000002), '1M+');
    $this->assertEquals($sc->format(1234567), '1.2M+');
    $this->assertEquals($sc->format(7000000), '7M');
    $this->assertEquals($sc->format(7500000), '7.5M');
    $this->assertEquals($sc->format(7500001), '7.5M+');
    $this->assertEquals($sc->format(999000000), '999M');
    $this->assertEquals($sc->format(999000001), '999M+');
    $this->assertEquals($sc->format(999999990), '999.9M+');
    $this->assertEquals($sc->format(999999999), '999.9M+');
     
  }

  public function testFormatBillions(){
    $sc = new SocialCounters();
    
    $this->assertEquals($sc->format(1000000000), '1B');
    $this->assertEquals($sc->format(1000000002), '1B+');
    $this->assertEquals($sc->format(7000000000), '7B');
    $this->assertEquals($sc->format(7500000000), '7.5B');
    $this->assertEquals($sc->format(7500000001), '7.5B+');
    $this->assertEquals($sc->format(999000000000), '999B');
    $this->assertEquals($sc->format(999000000001), '999B+');
    $this->assertEquals($sc->format(999999999990), '999.9B+');
    $this->assertEquals($sc->format(999999999999), '999.9B+');
     
  }

  public function testFormatTrillions() {
    $sc = new SocialCounters();
    
    $this->assertEquals($sc->format(1000000000000), '1T');
    $this->assertEquals($sc->format(1000000000002), '1T+');
    $this->assertEquals($sc->format(7000000000000), '7T');
    $this->assertEquals($sc->format(7500000000000), '7.5T');
    $this->assertEquals($sc->format(7500000000001), '7.5T+');
    $this->assertEquals($sc->format(999000000000000), '999T');
    $this->assertEquals($sc->format(999000000000001), '999T+');
    $this->assertEquals($sc->format(999999999999990), '999.9T+');
    $this->assertEquals($sc->format(999999999999999), '999.9T+');
     
  }

  public function testFormatQuadrilions() {
    $sc = new SocialCounters();
    
    $this->assertEquals($sc->format(1000000000000000), '1000T');
    $this->assertEquals($sc->format(1000000000000001), '1000T+');
  
  }

  public function testCustomSufixes() {
    $sc = new SocialCounters();

    $sc->thousandSuffix = 'G';
    $this->assertEquals($sc->format(1234), '1.2G+');

    $sc->millionSuffix = 'Z';
    $this->assertEquals($sc->format(1200001), '1.2Z+');

    $sc->billionSuffix = 'U';
    $this->assertEquals($sc->format(1700000000), '1.7U');

    $sc->trillionSuffix = 'L';
    $this->assertEquals($sc->format(1000000000000001), '1000L+');

  }
    
}