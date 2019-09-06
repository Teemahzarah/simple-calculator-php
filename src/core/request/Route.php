<?php

namespace app\core\request;

use stdClass;
use Exception;

class Route
{
  public function render(string $dirroot, array $request): void
  {
    $route = empty($request['q']) ? '' : $request['q'];
    $routes = $this->loadRoutes($dirroot);
    $use = (empty($routes->{$route})) ? null : $routes->{$route};
    if ($use) {
      (new $use($_POST))->render();
    } else {
      throw new Exception("{$use} not found.");
    }
    return;
  }

  private function loadRoutes(string $dirroot): object
  {
    $routes = json_decode(file_get_contents("{$dirroot}/src/routes.json"));
    if (json_last_error() !== JSON_ERROR_NONE) {
      $routes = new stdClass();
    }
    return  $routes;
  }
}
