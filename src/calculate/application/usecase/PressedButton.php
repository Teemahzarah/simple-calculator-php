<?php

namespace app\calculate\application\usecase;

class PressedButton
{
  const ALLOWED = '/[\d|\.|\+|\-|\*|\/|mod]/si';

  private $value = null;

  public function __construct(string $value)
  {
    $this->value = (preg_match(self::ALLOWED, $value)) ? $value : '';
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

  public function isEqual(): bool
  {
    return (preg_match('/(=)/', $this->value));
  }
}
