<?php

namespace app\core;

use stdClass;

abstract class Controller
{
  private $params = null;

  public final function __construct(array $params)
  {
    $this->params = (object) $params;
  }

  protected final function getParams(): object
  {
    return $this->params;
  }

  abstract function render(): void;
}
