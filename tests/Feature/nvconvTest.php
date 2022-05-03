<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Custom\NWConv;

class nvconvTest extends TestCase
{

    public function test_Ones()
    {
        $number = 1;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "one");
    }
    
    public function test_Tens()
    {
        $number = 10;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "ten");
    }
    
    public function test_Dozen()
    {
        $number = 17;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "seventeen");
    }

    public function test_Hundred()
    {
        $number = 100;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "one hundred");
    }

    public function test_Thousand()
    {
        $number = 1000;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "one thousand");
    }

    public function test_DozenThousand()
    {
        $number = 19000;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "nineteen thousand");
    }

    public function test_HundredThousands()
    {
        $number = 250600;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "two hundred fifty thousand six hundred");
    }

    public function test_MillThous()
    {
        $number = 7100000;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "seven million one hundred thousand");
    }

    public function test_MoreMill()
    {
        $number = 217900800;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "two hundred seventeen million nine hundred thousand eight hundred");
    }

    public function test_BillMillZeroThous()
    {
        $number = 345980000228;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getInteger(), "three hundred forty-five billion nine hundred eighty million two hundred twenty-eight");
    }

    public function test_IntegerAndTwoDecimal()
    {
        $number = 120.78;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getWords(), "one hundred twenty and 78/100");
    }
    
    public function test_IntegerAndOneDecimal()
    {
        $number = 120.8;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getWords(), "one hundred twenty and 80/100");
    }

    public function test_IntegerAndOneSecondDecimal()
    {
        $number = 120.08;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getWords(), "one hundred twenty and 08/100");
    }


    public function test_OnlyDecimal()
    {
        $number = .08;
        $conv = new NWConv($number);
        $this->assertEquals($conv->getWords(), "08/100");
    }

    public function test_ZerosAndOnlyDecimal()
    {
        $number = '0000.08';
        $conv = new NWConv($number);
        $this->assertEquals($conv->getWords(), "08/100");
    }

}
