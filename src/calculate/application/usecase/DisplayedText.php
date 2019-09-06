<?php

namespace app\calculate\application\usecase;

use app\calculate\application\usecase\PressedButton;

class DisplayedText
{
  private $text = '';

  public function __construct(string $text)
  {
    $clean = '/^(\.|\+|\*|\/|mod)(.*)$/si';
    $duplicate = '/(\-|\.|\+|\*|\/|mod)(\-|\.|\+|\*|\/|mod).*/si';
    $text = (preg_match($clean, $text)) ?
      preg_replace($clean, '$2', $text) : $text;
    $text = (preg_match($duplicate, $text)) ?
      preg_replace($duplicate, '$1', $text) : $text;
    $this->text = $text;
  }

  public function getText(): string
  {
    return $this->text;
  }
}
