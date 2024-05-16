<?php

class FoodCalculator {
    private $csvFile;

    public function __construct($csvFile) {
        $this->csvFile = $csvFile;
    }

    public function getFoodOptions() {
        $foodOptions = [];

        $file = fopen($this->csvFile, 'r');
        if($file !== false) {
            fgetcsv($file);
            while (($row = fgetcsv($file)) !== false) {
                $foodOptions[] = $row[1];
            }
            fclose($file);
        } return $foodOptions;
    }
}
$calculator = new FoodCalculator('calories.csv');
$result = $calculator -> getFoodOptions();
var_dump($result);