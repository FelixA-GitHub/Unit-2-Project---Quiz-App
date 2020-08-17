<?php
include ('inc/quiz.php');
//var_dump($_SESSION["used_indexes"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <?php if (($toast != null) && ($show_score == false)) {
                     echo '<p>' . $toast . '</p>';
                   }

                  if ($show_score == true) {
                     if ($_SESSION['totalCorrect'] < 7) {
                        echo '<p> Bummer! Study more and try again! </p>';
                        echo '<p>You got ' . $_SESSION["totalCorrect"] . ' of ' . $totalQuestions . ' correct! </p>';
                        echo '<form action="" method="get">
                          <input type="submit" name="restart" value="Restart Quiz" /></form>';
                     } else {
                          echo '<p> Yay! Well Done! </p>';
                          echo '<p>You got ' . $_SESSION["totalCorrect"] . ' of ' . $totalQuestions . ' correct! </p>';
                     }
                   } else {
                        echo '<p class="breadcrumbs">Question ' . count($_SESSION["used_indexes"]) . ' of ' . $totalQuestions . '</p>';
                        echo '<p class="quiz">What is ' . $question["leftAdder"] . ' + ' . $question["rightAdder"] . '? </p>';
                        echo '<form action="index.php" method="post">
                        <input type="hidden" name="index" value="' . $index . '" />
                        <input type="submit" class="btn" name="answer" value="' . $answers[0] . '" />
                        <input type="submit" class="btn" name="answer" value="' . $answers[1] . '" />
                        <input type="submit" class="btn" name="answer" value="' . $answers[2] . '" />
                      </form>';
                   }
             ?>
        </div>
    </div>
</body>
</html>
