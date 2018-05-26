<?php

namespace Coded\Test\JSON;

use Coded\JSON\JSON;
use Coded\JSON\JSONException;
use PHPUnit\Framework\TestCase;

class JSONTest extends TestCase{

    public function testEncode(){
        $value = ['one','two'];
        $this->assertEquals(JSON::encode($value), json_encode($value));
    }

    public function testEncode_fails(){
        $this->expectException(JSONException::class);

        //https://stackoverflow.com/questions/47962607/how-to-make-json-encode-fail
        JSON::encode(NAN);
    }

    public function testDecode(){
        $value = ['one','two'];
        $encoded = json_encode($value);
        $this->assertEquals(JSON::decode($encoded), json_decode($encoded));
    }

    public function testDecode_fails(){
        $this->expectException(JSONException::class);

        $value = ['one','two'];
        $encoded = '<'.json_encode($value);
        JSON::decode($encoded);
    }

    public function testLoad(){
        $arr = ['name'=>'coded','description'=>'json'];
        $object = JSON::load(__DIR__, 'test');
        $this->assertEquals($object, json_decode(json_encode($arr)));
    }

    public function testLoad_fails(){
        $this->expectException(JSONException::class);
        JSON::load('_thisFolderShouldNotExist_', '_thisJsonShouldNotExist_');
    }
}