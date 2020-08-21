<?php
// Function to generate random questions
function getRandomQuestions() {

$new_questions = array();

// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {


// Get random numbers for left and right adders
  $new_questions[$i]['leftAdder'] = rand(0,50);
  $new_questions[$i]['rightAdder'] = rand(0,50);


// Calculate correct answer by adding left and right adders together
  $new_questions[$i]['correctAnswer'] = ($new_questions[$i]['leftAdder']) + ($new_questions[$i]['rightAdder']);


// Get random incorrect answers for first/second incorrect answers within +/-10 of correct answer
  $new_questions[$i]['firstIncorrectAnswer'] = $new_questions[$i]['correctAnswer'] + rand(-10,10);
  $new_questions[$i]['secondIncorrectAnswer'] = $new_questions[$i]['correctAnswer'] + rand(-10,10);


// Ensures answers are unique and not the same as the correct answer or another incorrect answer in the current question.
  do {
        $new_questions[$i]['firstIncorrectAnswer'] = $new_questions[$i]['correctAnswer'] + rand(-10,10);
    } while ($new_questions[$i]['firstIncorrectAnswer'] == $new_questions[$i]['correctAnswer']);

  do {
        $new_questions[$i]['secondIncorrectAnswer'] = $new_questions[$i]['correctAnswer'] + rand(-10,10);
    } while ($new_questions[$i]['secondIncorrectAnswer'] == ($new_questions[$i]['correctAnswer'] || $new_questions[$i]['firstIncorrectAnswer']));

  }

// Adds question and answer to question array
  return $new_questions;
}
