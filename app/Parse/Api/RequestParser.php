<?php

namespace App\Parse\Api;

use Illuminate\Http\Request;

use App\Parse\Api\Version;

class RequestParser {

  protected $request, $suppliedInRequest, $availableApiVersions, $fallback;

  function __construct($request) {
      $this->request = $request;
      $this->availableApiVersions = ['v1','v2'];
  }

  public function getApiVersion() {
      $isApiVersionValid = $this->isApiVersionValid();
      $version = $this->extractApiVersionFromRequest();
      return Version::getVersion($version);
  }

  public function isApiVersionValid() {

    $supplied = $this->isApiVersionSupplied();
    $version  = $this->extractApiVersionFromRequest();

    return $supplied && in_array($version, $this->availableApiVersions);

  }

  public function isApiVersionSupplied() {
    return ($this->extractApiVersionFromRequest() != '');
  }

  public function extractApiVersionFromRequest() {
    if( ! is_null($this->request) && $this->request instanceof Request) {
       $version = $this->request->header('api_version');
       return $version ? $version : '';
    }
  }

}
