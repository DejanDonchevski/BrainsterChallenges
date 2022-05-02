let number = 10

if(number % 2 == 0) {
    console.log(`The number ${number} is even`)
} else if(number % 2 == 1) {
    console.log(`The number ${number} is not even`)
} else {
    console.log('Please enter a valid number')
}



// or with ternary operator

// const number = prompt("Please enter a number: ")

// const result = (number % 2 == 0) ? "even" : "not even"

// console.log(`The ${number} is ${result}.`)