<?php

namespace app\calculate\input\controller;

use app\core\Controller;
use app\calculate\application\usecase\MakeLog;
use app\calculate\application\usecase\MakeCalculation;
use app\calculate\application\usecase\CalculateResponse;

class CalculateExpression extends Controller
{
  public function render(): void
  {
    $display = empty($this->getParams()->display) ? '' : $this->getParams()->display;
    $button = empty($this->getParams()->button) ? '0' : $this->getParams()->button;
    (new CalculateResponse())->listenErros()->send(
      (new MakeCalculation())->make($display, $button),
      (new MakeLog())->make($display, $button)
    );
    return;
  }
}
