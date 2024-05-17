<?php

//make a class
class FoodCalculator {
    private $csvFile; //encapsulation and the csvFile won't be accessed in another class

    //make a constructor
    public function __construct($csvFile) {
        $this->csvFile = $csvFile;
    }

    // make food options using `while` loop
    public function getFoodOptions() {
        $foodOptions = [];
        // Open csvFile
        $file = fopen($this->csvFile, 'r');
        if($file !== false) {
            //it will skip the banner
            fgetcsv($file);
            while (($row = fgetcsv($file)) !== false) {
                $foodOptions[] = $row[1];
            }
            fclose($file);
        } return $foodOptions;
    }

    public function calculateCalories($food, $amount) {
        $calories = 0;

        $file = fopen($this->csvFile, 'r');
        if($file !== false) {
            // it will skip the banner
            fgetcsv($file);
            while (($row = fgetcsv($file)) !== false) {
                if ($row[1] === $food) {
                    $caloriesPer100grams = (float)$row[3];
                    $calories = ($caloriesPer100grams/100) * $amount;
                    break;
                }

            }
            fclose($file);
        } return $calories;
    }
}

//make the object and try it
$calculator = new FoodCalculator('calories.csv');
$result = $calculator -> getFoodOptions();
var_dump($result);

$totalCalories = $calculator -> calculateCalories("Canned Apricots", 100);
echo "$totalCalories \n";

$totalCalories = $calculator -> calculateCalories("Avocado", 50);
echo "Total calories for Avocado is $totalCalories \n";


$food = "Avocado";
$amount = 100;
$totalCalories = $calculator -> calculateCalories($food, $amount);
echo "Total calories for $amount gram(s) of $food is $totalCalories \n";



/* I'll connect this logic to my index later */