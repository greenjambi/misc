package main

import (
	"fmt"
	"math"
)

func IsPrimeSqrt(value float64) bool {
	for i := 2; i <= int(math.Floor(math.Sqrt(value))); i++ {
		if int(value) % i == 0 {
			return false
		}
	}
	return value > 1
}

func nextPrime(value float64) float64 {
	nextPrimeFound := false
	for nextPrimeFound == false {
		value += 1
		if IsPrimeSqrt(value) {
			nextPrimeFound = true
			return value
		}
	}
	return 0
}

func powerSum(a float64, b float64, c float64) float64 {
	return math.Pow(a, float64(2)) + math.Pow(b, float64(3)) + math.Pow(c, float64(4))
}

func main() {

	a := float64(2)
	b := float64(2)
	c := float64(2)

	maxPowerSum := float64(50000000)

	powerSumNumbers := make(map[float64]struct{})

	for math.Pow(c, 4) < maxPowerSum {

		powerSum := powerSum(a, b, c)

		if  powerSum < maxPowerSum {
			powerSumNumbers[powerSum] = struct{}{}
		}

		a = nextPrime(a)

		if math.Pow(a, float64(2)) > maxPowerSum {
			a = float64(2)
			b = nextPrime(b)
			if math.Pow(b, float64(3)) > maxPowerSum {
				b = 2
				c = nextPrime(c)
			}
		}
	}

	fmt.Printf("%v \n", powerSumNumbers)
	fmt.Printf(" ------------ \n")
	fmt.Printf("Number of items : %v \n", len(powerSumNumbers))

}


