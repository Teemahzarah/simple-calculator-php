<?php

namespace app\calculate\application\usecase;

class PressedButton
{
  private $value = null;

  public function __construct(string $value)
  {
    $this->value = $value;
    if ($this->isReset()) {
      $this->value = 'reset';
    } elseif ($this->isMod()) {
      $this->value = 'mod';
    } elseif (preg_match('/^[\d|\.|\=|\+|\-|\*|\/]$/', $this->value)) {
      $this->value = $this->value;
    } else {
      $this->value = preg_replace('/\D/s', '', $this->value);
    }
  }

  public function getValue(): string
  {
    return $this->value;
  }

  public function isNumber(): bool
  {
    return (preg_match('/(\d{1,})/', $this->value));
  }

  public function isDot(): bool
  {
    return (preg_match('/(\.)/', $this->value));
  }

  public function isReset(): bool
  {
    return (preg_match('/(reset)/i', $this->value));
  }

  public function isMod(): bool
  {
    return (preg_match('/(mod)/i', $this->value));
  }

  public function isEqual(): bool
  {
    return (preg_match('/(=)/', $this->value));
  }
}
