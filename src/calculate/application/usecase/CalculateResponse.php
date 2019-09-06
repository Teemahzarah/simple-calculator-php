<?php

namespace app\calculate\application\usecase;

class CalculateResponse
{
  public function listenErros(): CalculateResponse
  {
    $that = $this;
    set_error_handler(function ($errno, $errstr, $errfile, $errline) use ($that) {
      $that->send('', $errstr);
      exit;
    });
    return $this;
  }

  public function send(string $current, string $log): CalculateResponse
  {
    header('Content-Type: application/json');
    echo json_encode(array(
      'current' => $current,
      'log' => $log
    ));
    return $this;
  }
}
