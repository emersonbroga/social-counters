<?php 

namespace EmersonBroga;

/**
*  SocialCounters
*
*  A Simple PHP class to convert numbers to social media counters like from 1000 to 1K, 1000001 to 1M+.
*
*  @author emersonbroga <emerson.broga@gmail.com>
*/
class SocialCounters {

  public $thousandSuffix = 'K';
  public $millionSuffix = 'M';
  public $billionSuffix = 'B';
  public $trillionSuffix = 'T';

  const TRILLION = 1000000000000;
  const BILLION = 1000000000;
  const MILLION = 1000000;
  const THOUSAND = 1000;
  const HUNDRED = 100;
    
  /**
   * Format a number to social media counter.
   *
   * @param int $n The integer.
   * @return string The formated string
   */
  public function format($n)
  {
    if ($n < self::THOUSAND) {
      return (string) $n;
    }

    if ($n >= self::THOUSAND && $n < self::MILLION) {
      return $this->formatNumberToMark($n, self::THOUSAND, $this->thousandSuffix); 
    }

    if ($n >= self::MILLION && $n < self::BILLION) {
      return $this->formatNumberToMark($n, self::MILLION, $this->millionSuffix);
    }

    if ($n >= self::BILLION && $n < self::TRILLION) {
      return $this->formatNumberToMark($n, self::BILLION, $this->billionSuffix);
    }

    if ($n >= self::TRILLION) {
      return $this->formatNumberToMark($n, self::TRILLION, $this->trillionSuffix);
    }
  }

  /**
   * Formats integer, decimal and suffix into a concatenated string.
   *
   * @param int $int The integer.
   * @param float $decimal The decimal.
   * @param string $suffix The suffix.
   *
   * @return string The concatenated string
   */
  private function formatString($int, $decimal = 0.0, $suffix = '')
  {
    $decimal = intval(($decimal * 10) - ($int * 10), 10);
    
    if ($decimal > 0) {
      $total = sprintf('%d.%d%s', $int, $decimal, $suffix);
    } else {
      $total = sprintf('%d%s', $int, $suffix);
    }
    return $total;
  }

  /**
   * Formats the number to a specific mark (thousands, millions, billions)
   *
   * @param int $n The number to format.
   * @param float $mark The mark (thousands, millions, billions).
   * @param string $suffix The suffix.
   *
   * @return string The formated string
   */
  private function formatNumberToMark($n, $mark, $suffix = '') 
  {
    if ($n === $mark) return sprintf('1%s', $suffix);
    
    $decimal = ($n / $mark);
    $r = (($decimal * $mark) == $n);
   
    $int = intval($decimal);
    $string = $this->formatString($int, $decimal, $suffix);

    if(floatval($string) * $mark == $n) {
      return $string;
    }
    return $string . '+';
  }
}
  
