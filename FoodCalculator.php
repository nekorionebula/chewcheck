<?php

//make a class
class FoodCalculator {
    private $csvFile; //encapsulation to ensure the csvFile is not accessed outside the class

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
                    if ($row[5] == "Food") {
                        $amount = "$amount gr";
                    }else {
                        $amount = "$amount ml";
                    }
                    break;
                }

            }
            fclose($file);
            // to add kind  I use array to return. any idea instead of this?
        }  return ["calories" => $calories, "amount" => $amount];
    }
}