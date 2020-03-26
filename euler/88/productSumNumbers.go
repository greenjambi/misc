package main

import (
	"fmt"
	"math"
)

func findSmallestProductForLength(length int)  int {
	numbers := make([]int, length)
	smallestSumNumber := 2 * length
	for index := range numbers {
		numbers[index] = 1
	}
	numbers[length-1] = 2
	numbers[length-2] = 2

	fmt.Printf("Length : %v \n", length)

	for {
		ok := incrementNumbers(numbers, length -1, smallestSumNumber)

		//fmt.Printf("  Numbers : %v \n", numbers)

		if ok == false {
			break
		}

		sum := sum(numbers)
		product := product(numbers)
		//fmt.Printf("  Product : %v \n", product)
		//fmt.Printf("  Current minimal product-sum number: %v \n", smallestSumNumber)

		if sum == product && sum < smallestSumNumber {
			smallestSumNumber = sum
		}

	}

	fmt.Printf("  Smallest product-sum number : %v \n", smallestSumNumber)

	return smallestSumNumber
}

func incrementNumbers(numbers []int, index int, maxAllowedProduct int) bool {

	if index < 0 {
		return false
	}

	numbers[index]+=1

	productForRangeWithOneLessLength := productForRange(numbers, index-1)
	length := len(numbers)
	numberAtIndex := numbers[index]
	if index == length - 1 {
		minAllowedAllowedAtThisIndex := int(0.75 * float64(maxAllowedProduct) / float64(productForRangeWithOneLessLength))
		// If we are incrementing the last number in the array,
		// do not just start from lowest end, instead, start from something that is more reasonable.
		// Assuming, reasonable to be a number that would make the product within 25% of current minimal product sum

		if numberAtIndex < minAllowedAllowedAtThisIndex {
			numbers[index] = minAllowedAllowedAtThisIndex
			numberAtIndex = minAllowedAllowedAtThisIndex
		}
	}


	temp1 := length - index
	temp2 := float64(maxAllowedProduct) / float64(productForRangeWithOneLessLength)

	maxAllowedLimitAtThisIndex := int(math.Pow(temp2, 1 / float64(temp1)))

	isNumberAtIndexLargerThanAllowed := false
	if numberAtIndex > maxAllowedLimitAtThisIndex {
		isNumberAtIndexLargerThanAllowed = true
	}
	isIndexWithingRange := false
	if index < length -1 {
		isIndexWithingRange = true
	}

	isNumberAtIndexLargerThanTheNextNumber := false
	if index < length - 1 && numbers[index] > numbers[index+1] {
		isNumberAtIndexLargerThanTheNextNumber = true
		panic("Number at index larger than next number")
	}

	if isNumberAtIndexLargerThanAllowed || (isIndexWithingRange && isNumberAtIndexLargerThanTheNextNumber)  {
		if index == 0 || numberAtIndex == 2 {
			// If the index is 0 no level down to go
			// If number at index is 2, and we identify we have to down again, we will never get a number more than 2
			// and hence we can stop the run here.
			return false
		}
		ok := incrementNumbers(numbers, index - 1, maxAllowedProduct)
		if ok == false {
			return false
		}
		numbers[index] = numbers[index-1]
	}

	return true
}

func sum(numbers []int) int {
	sum := 0
	for _,number := range numbers {
		sum += number
	}
	return sum
}

func product(numbers []int) int {
	product := 1
	for _,number := range numbers {
		product *= number
	}
	return product
}

func productForRange(numbers []int, intRange int) int {
	product := 1
	for i:=0; i<=intRange; i++ {
		product *= numbers[i]
	}
	return product
}

func contains(s []int, e int) bool {
	for _, a := range s {
		if a == e {
			return true
		}
	}
	return false
}

func main()  {

	minLength := 2
	maxLength := 12000

	numbers := make([]int, maxLength+1)

	sumNumbers := 0
	minimalSumNumberForLength := 0

	for i:=minLength; i<=maxLength; i++ {
		minimalSumNumberForLength = findSmallestProductForLength(i)

		if !contains(numbers, minimalSumNumberForLength) {
			numbers[i] = minimalSumNumberForLength
			sumNumbers += minimalSumNumberForLength
		}
	}

	fmt.Printf("Sum of the minimal product-sum numbers : %v \n", sumNumbers)

}
