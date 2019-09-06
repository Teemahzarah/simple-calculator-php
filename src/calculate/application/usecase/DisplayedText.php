<?php

namespace app\calculate\application\usecase;

class DisplayedText
{

  private $text = '';

  public function __construct(string $text)
  {
    $this->text = $text;
  }

  public function getText(): string
  {
    return $this->text;
  }
}
