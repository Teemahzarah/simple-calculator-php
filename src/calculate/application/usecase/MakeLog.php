<?php

namespace app\calculate\application\usecase;

use app\calculate\application\usecase\DisplayedText;
use app\calculate\application\usecase\PressedButton;

class MakeLog
{
  public function make(string $display, string $button): string
  {
    $result = '';
    $displayedText = new DisplayedText($display);
    $pressedButton = new PressedButton($button);
    if (!$pressedButton->isReset()) {
      $result = $displayedText->getText();
    }
    return $result;
  }
}
