package main

import (
	"encoding/csv"
	"fmt"
	"os"
)

func main() {
	inputFile := "calories.csv"
	outputFile := "caloriescopy.csv"

	// Open input file
	infile, err := os.Open(inputFile)
	if err != nil {
		fmt.Printf("Can't open %s: %v\n", inputFile, err)
		return
	}
	defer infile.Close()

	// r input file
	reader := csv.NewReader(infile)
	rows, err := reader.ReadAll()
	if err != nil {
		fmt.Printf("Can't read %s: %v\n", inputFile, err)
		return
	}

	// open output file
	outfile, err := os.Create(outputFile)
	if err != nil {
		fmt.Printf("Can't make %s: %v\n", outputFile, err)
		return
	}
	defer outfile.Close()

	writer := csv.NewWriter(outfile)
	defer writer.Flush()

	for _, row := range rows {
		// if row has i[2]
		if len(row) > 2 {
			if row[2] == "100g" {
				// pastiin row cukup panjang buat nambahin elemen di index 5
				for len(row) <= 5 {
					row = append(row, "")
				}
				row[5] = "Food"
			} else if row[2] == "100ml" {
				for len(row) <= 5 {
					row = append(row, "")
				}
				row[5] = "Beverage"
			} else {
				for len(row) <= 5 {
					row = append(row, "") //actually it's not that important to csv file but just add it
				}
			}
		}
		// Write row to new file
		err = writer.Write(row)
		if err != nil {
			fmt.Printf("Cannot write file %s: %v\n", outputFile, err)
			return
		}
	}

	fmt.Printf("New file: %s\n", outputFile)
	fmt.Printf("Succeed")
}
