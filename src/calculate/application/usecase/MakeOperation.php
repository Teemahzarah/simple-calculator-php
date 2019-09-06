<?php

namespace app\calculate\application\usecase;

use app\calculate\application\usecase\PressedButton;
use app\calculate\application\usecase\PrepareExpression;

class MakeOperation
{
  private $expression = null;
  private $pressedButton = null;

  public function __construct(PrepareExpression $expression, PressedButton $pressedButton)
  {
    $this->expression = $expression;
    $this->pressedButton = $pressedButton;
  }

  public function getResult(): string
  {
    $result = '';
    $result .= $this->makeOperation();
    $result .= $this->pressedButton();
    return $result;
  }

  private function makeOperation(): string
  {
    $result = $this->expression->getExpression();
    if (
      $this->expression->isExpression()
      && !$this->pressedButton->isNumber()
      && !$this->pressedButton->isDot()
    ) {
      switch ($this->expression->getOperation()) {
        case '+':
          $result = ($this->expression->getNumberA()
            + $this->expression->getNumberB());
          break;
      }
    }
    return "{$result}";
  }

  private function pressedButton(): string
  {
    $result = '';
    if (
      !$this->pressedButton->isNumber()
      && !$this->pressedButton->isEqual()
    ) {
      $result .= $this->pressedButton->getValue();
    }
    return $result;
  }
}
