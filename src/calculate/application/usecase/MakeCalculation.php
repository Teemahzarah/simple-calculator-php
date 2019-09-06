<?php

namespace app\calculate\application\usecase;

use app\calculate\application\usecase\DisplayedText;
use app\calculate\application\usecase\MakeOperation;
use app\calculate\application\usecase\PressedButton;
use app\calculate\application\usecase\PrepareExpression;

class MakeCalculation
{
  public function execute(string $display, string $button): string
  {
    $result = '';
    $displayedText = new DisplayedText($display);
    $pressedButton = new PressedButton($button);
    if (!$pressedButton->isReset()) {
      $expression = new PrepareExpression($displayedText, $pressedButton);
      $operation = new MakeOperation($expression, $pressedButton);
      $result = (new DisplayedText($operation->getResult()))->getText();
    }
    return $result;
  }
}
