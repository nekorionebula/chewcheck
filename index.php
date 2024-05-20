<?php
require_once 'FoodCalculator.php';

//make an object
$calculator = new FoodCalculator('.data/calories.csv');
$result = '';

//http server's method  is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // null coalescing
    $food = $_POST['food'] ?? '';
    $amount = $_POST['amount'] ?? 0;
    if ($food && $amount > 0) {
        $totalCalories = $calculator -> calculateCalories($food, $amount);
        $result = "Total calories for ".$totalCalories['amount']. " of $food is " .$totalCalories['calories']. " calories.";
    }else {
        $result = "Please select a food and enter the amount in grams/ml.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chewcheck</title>
    <link rel="stylesheet" href="styles/styles.css"> 
</head>
<body>

<div class = "container">
<h2>Chew Check</h2>
<form method="post">
    <label for="food">Food: </label>
    <select name="food" id="food">
        <option value="">Select food</option>
        <?php
        $foodOptions = $calculator -> getFoodOptions();
        foreach($foodOptions as $foodOption) {
            echo "<option value = \"$foodOption\">$foodOption</option>";
        }
        ?>
    </select>
    <br>
    <label for="amount">Amount (gr/ml): </label>
    <input type="number" name="amount" id="amount" min="1" step="1">
    <br>
    <input type="submit" value="Calculate">
</form>
<p><?= $result?></p>
<div class = "links">
    <a href="https://github.com/nekorionebula"><img src="assets/github-mark-white.svg" alt="GitHub" class="github"></a>
</div>
</div>


</body>
</html>
