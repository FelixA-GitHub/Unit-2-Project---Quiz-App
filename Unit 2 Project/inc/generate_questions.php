<?php
// Generate random questions

$questions = [];

// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {

  // Get random numbers to add
  $questions[$i]['leftAdder'] = rand(0,50);
  $questions[$i]['rightAdder'] = rand(0,50);

// Calculate correct answer
  $questions[$i]['correctAnswer'] = ($questions[$i]['leftAdder']) + ($questions[$i]['rightAdder']);

// Get incorrect answers within 10 numbers either way of correct answer
  $questions[$i]['firstIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(-10,10);
  $questions[$i]['secondIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(-10,10);

// Make sure it is a unique answer
  do {
        $questions[$i]['firstIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(-10,10);
    } while ($questions[$i]['firstIncorrectAnswer'] == $questions[$i]['correctAnswer']);

  do {
        $questions[$i]['secondIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(-10,10);
    } while ($questions[$i]['secondIncorrectAnswer'] == $questions[$i]['correctAnswer']);

// Add question and answer to questions array
}
//echo $questions;
