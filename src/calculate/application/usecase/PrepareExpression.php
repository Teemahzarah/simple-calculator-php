<?php

namespace app\calculate\application\usecase;

use app\calculate\application\usecase\DisplayedText;
use app\calculate\application\usecase\PressedButton;

class PrepareExpression
{
  private $expression = '';
  private $numberA = 0.0;
  private $operation = '';
  private $numberB = 0.0;

  public function __construct(DisplayedText $displayedText, PressedButton $pressedButton)
  {
    $pattern = '/^(\-?\d{1,})(\.\d{1,})?(\+|\-|\*|\/|mod)(\d{1,})(\.\d{1,})?$/';
    $this->expression = ($pressedButton->isNumber()) ?
      "{$displayedText->getText()}{$pressedButton->getValue()}" : $displayedText->getText();
    if (preg_match($pattern, $this->expression)) {
      $this->operation = preg_replace($pattern, '$3', $this->expression);
      $this->numberA = floatval(
        preg_replace($pattern, '$1', $this->expression) .
          preg_replace($pattern, '$2', $this->expression)
      );
      $this->numberB = floatval(
        preg_replace($pattern, '$4', $this->expression) .
          preg_replace($pattern, '$5', $this->expression)
      );
    }
  }

  public function isExpression(): bool
  {
    return strlen("{$this->numberA}")
      && strlen("{$this->operation}")
      && strlen("{$this->numberB}");
  }

  public function getExpression(): string
  {
    return $this->expression;
  }

  public function getNumberA(): float
  {
    return floatval($this->numberA);
  }

  public function getOperation(): string
  {
    return $this->operation;
  }

  public function getNumberB(): float
  {
    return floatval($this->numberB);
  }
}
