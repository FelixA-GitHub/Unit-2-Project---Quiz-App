<?php
// Start the session
session_start();

// Include questions from the generate_questions.php file for Exceeds Expectations
include ('inc/generate_questions.php');

// Variable to determine if the score will be shown or not, set to false.
$show_score = false;

// Variable to hold a random index, set to null.
$index = null;

// Variable to hold the current question, set to null.
$currentQuestion = null;

// Variable to hold the toast message, set to an empty string.
$toast = "";


/* For POST server:
       1)Checks if user answer equaled the correct answer, congratulates you if it was correct, and increments the total correct answered by one.
       2) If incorrect, you are given a bummer toast and the total correct answer stays the same.
*/
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if($_POST['answer'] == $_SESSION['questions'][$_POST['index']]['correctAnswer']) {
        $toast = "Well done! That's correct.";
        $_SESSION["totalCorrect"]++;
    } else {
        $toast = "Bummer! That was incorrect.";
  }
}


// Variable to hold the total number of questions asked
$totalQuestions = count(getRandomQuestions());


//When the count of used_indexes equals the total number of questions, the quiz ends
if(!isset($_SESSION['used_indexes']) || count($_SESSION['used_indexes']) == $totalQuestions) {
    $show_score = true;
    $_SESSION['used_indexes'] = [];
} else {
    $show_score = false;

  //Only when starting with the first question, a fresh set of 10 random questions and answers are added. This resets the score as well.
    if(count($_SESSION['used_indexes']) == 0) {
        $_SESSION['questions'] = getRandomQuestions();
        $_SESSION['totalCorrect'] = 0;
        $toast = '';
    }


  //This loop makes sure we do not have duplicate questions displayed
    do {
        $index = array_rand($_SESSION['questions']);
    } while (in_array($index, $_SESSION["used_indexes"]));

    $question =  $_SESSION['questions'][$index];

    array_push($_SESSION['used_indexes'], $index);

    $count = count($_SESSION['used_indexes']);

    $answers = [$question['correctAnswer'],
                $question['firstIncorrectAnswer'],
                $question['secondIncorrectAnswer']];


//Answers shuffled so they are appear in random buttons
  shuffle($answers);
}






//session_destroy();
