<?php

namespace App\Parse\Api;

use ReflectionClass;

abstract class Version {

  const Version1 = 'v1';
  const Version2 = 'v2';

  public static function getVersion($code)
  {
    $class = new ReflectionClass( get_class() );
    $constants = $class->getConstants();
    $constants = array_flip($constants);
    if( array_key_exists($code, $constants) ) {
        return $code;
    }
    // Currently this is the fallback. Not very verbose in my opinion,
    // so I need to try to come up with something more clever..
    // To be continued.
    return 'v1';
  }

}
