<?php

namespace app\calculate\input\controller;

use app\core\Controller;
use app\calculate\application\usecase\MakeCalculation;

class CalculateExpression extends Controller
{
  public function render(): void
  {
    header('Content-Type: application/json');
    $display = empty($this->getParams()->display) ? '' : $this->getParams()->display;
    $button = empty($this->getParams()->button) ? '0' : $this->getParams()->button;
    $result = array(
      'current' => (new MakeCalculation())->execute($display, $button)
    );
    echo json_encode($result);
  }
}
