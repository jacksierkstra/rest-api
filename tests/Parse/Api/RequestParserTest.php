<?php

use App\Parse\Api\RequestParser;
use Illuminate\Http\Request;
use App\Parse\Api\Version;

class RequestParserTest extends TestCase
{

    public function testNoInformationAboutTheApiVersionIsApiVersionSuppliedShouldReturnFalse()
    {
      $request = new Request();
      $requestParser = new RequestParser($request);
      $this->assertFalse($requestParser->isApiVersionSupplied());
    }

    public function testIncorrectApiInformationIsApiVersionSuppliedShouldReturnTrue() {
      $request = new Request();
      $incorrectVersion = ['api_version' => 'nonvalid'];
      $request->headers->replace($incorrectVersion);
      $requestParser = new RequestParser($request);
      $this->assertTrue($requestParser->isApiVersionSupplied());
    }

    public function testIncorrectApiVersionIsApiVersionValidShouldReturnFalse() {
      $request = new Request();
      $incorrectVersion = ['api_version' => 'nonvalid'];
      $request->headers->replace($incorrectVersion);
      $requestParser = new RequestParser($request);
      $this->assertFalse($requestParser->isApiVersionValid());
    }

    public function testCorrectApiVersionIsApiVersionValidShouldReturnTrue() {
      $request = new Request();
      $correctVersion = ['api_version' => 'v1'];
      $request->headers->replace($correctVersion);
      $requestParser = new RequestParser($request);
      $this->assertTrue($requestParser->isApiVersionValid());
    }

    public function testInvalidApiVersionGetApiVersionShouldStickToFallback() {
      $request = new Request();
      $incorrectVersion = ['api_version' => 'nonvalid'];
      $request->headers->replace($incorrectVersion);
      $requestParser = new RequestParser($request);
      $this->assertTrue($requestParser->getApiVersion() == Version::Version1);
    }

    public function testValidApiVersionGetApiVersionShouldReturnCorrectVersion() {
      $request = new Request();
      $correctVersion = ['api_version' => 'v2'];
      $request->headers->replace($correctVersion);
      $requestParser = new RequestParser($request);
      $this->assertTrue($requestParser->getApiVersion() == Version::Version2);
    }

}
