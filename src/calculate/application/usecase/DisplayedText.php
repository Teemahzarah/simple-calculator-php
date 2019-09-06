<?php

namespace app\calculate\application\usecase;

use app\calculate\application\usecase\PressedButton;

class DisplayedText
{

  const CLEAN = '/^(\.|\+|\*|\/|mod)(.*)$/si';

  private $text = '';

  public function __construct(string $text)
  {
    $text = (preg_match(self::CLEAN, $text)) ?
      preg_replace(self::CLEAN, '$2', $text) : $text;
    $this->text = $text;
  }

  public function getText(): string
  {
    return $this->text;
  }
}
