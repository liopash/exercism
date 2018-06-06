<?php 

class Bob
{
  public function respondTo($sentence)
  {
    if (preg_match_all('/\s/', $sentence) == strlen($sentence)) {
      return 'Fine. Be that way!';
    } elseif (preg_match_all('/[A-Z]/', $sentence) > 1 &&
              preg_match_all('/[a-z]/', $sentence) === 0) {
      return (substr(trim($sentence), -1) === "?") ? 'Calm down, I know what I\'m doing!' : 'Whoa, chill out!';
    } elseif (substr(trim($sentence), -1) === "?") {
      return 'Sure.';
    } else {
      return 'Whatever.';
    }
  }
}