<?php

class Brackets {
  /**
   * Проверка баланса скобок.
   *
   * @param  string  $input
   * @return boolean
   */
  public function isValid($input) {
    $length = strlen($input);
    $isOdd = $length % 2 != 0;

    // если длинна строки непарная или равна 0
    if ($isOdd || $length == 0) {
      return false;
    }

    for ($i = 0; $i < $length / 2; $i++) {
      $leftBracket = $input[$i];
      $rightBracket = $input[$length - $i - 1];

      // если скобки разного типа
      if (!$this->isEqualBrackets($leftBracket, $rightBracket)) {
        return false;
      }
    }

    return true;
  }

  /**
   * Являются ли скобки напарниками?
   *
   * @param  string  $left
   * @param  string  $right
   * @return boolean
   */
  private function isEqualBrackets($left, $right) {
    $brackets = [
      '[' => ']',
      '(' => ')',
      '{' => '}'
    ];

    if (isset($brackets[$left]) && $right === $brackets[$left]) {
      return true;
    }

    return false;
  }
}

$brackets = new Brackets();

echo ($brackets->isValid('')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('(')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('())')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('[(])')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('}{')) ? "Верно\n" : "Не верно\n";

echo ($brackets->isValid('()')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('[()]')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('{[()]}')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('[[[]]]')) ? "Верно\n" : "Не верно\n";
echo ($brackets->isValid('{[()]}')) ? "Верно\n" : "Не верно\n";
