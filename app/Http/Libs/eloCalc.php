<?php

class Elo
{

  function Calculator($curPlayerElo,$vsPlayerElo, $curPlayerWins, $totalGames)
  {
    settype($expectedWinRate, "float");
    settype($worth, "float");
    settype($actualWinRate, "float");
    settype($newElo, "float");

    //Determine K. Use lowest player's Elo to determine change
    if ($vsPlayerElo > $curPlayerElo)
    {
      $calcElo = $curPlayerElo;
    }
    else
    {
      $calcElo = $vsPlayerElo;
    }

    // Lower players need higher K to change to their value faster.
    // This will make it not feel so grim for lower Elo players who are making the climb.
    // New players will start at 1000 elo
    // No player can drop below 100 after final calculations, but can drop below 100 during bracket
    if ($calcElo <= 100)
    {
      $numK = 128;
    }
    elseif ($calcElo > 100 && $calcElo < 1000)
    {
      $numK = 64;
    }
    elseif ($calcElo >= 1000 && $calcElo < 1500 )
    {
      $numK = 32;
    }
    else
    {
      $numK = 16;
    }

    // Determine expected win rate "e"
    // Ex 1. 1500 Elo player (A) vs 1000 Elo Player (B)
    // Player A is expected win ~95% of the matches
    // A 2-1 set means each game is worth 33%
    // Player A wins 66% of mathces
    // 66% < 95%
    // Player A drops in Elo because this is an "upset"
    // Player B gains Elo
    $expectedWinRate = ( 1 / ( 1 + 10**(($vsPlayerElo-$curPlayerElo)/400) )); //https://en.wikipedia.org/wiki/Elo_rating_system#Mathematical_details
    $worth = (1 / $totalGames);
    $actualWinRate = ($curPlayerWins * $worth);
    $newElo = $curPlayerElo + ($numK * ($actualWinRate - $expectedWinRate));

    return($newElo);
  }

}

?>
