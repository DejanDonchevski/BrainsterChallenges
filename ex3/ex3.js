let nums = [13, 15, 20]
let largest = nums[0]
let smallest = nums[0]

for(let i = 1; i < nums.length; i++) {
    if(largest < nums[i]) {
        largest = nums[i]
    }

    if(smallest > nums[i]) {
        smallest = nums[i]
    }
}

function isPrime(num) {
    for(let i = 2; i < num; i++) {
        if(num % i == 0) {
            return 'is not prime'
        } else {
            return 'is prime'
        }
    }
}

console.log('The smallest number', smallest, isPrime(smallest))
console.log('The largest number', largest, isPrime(largest))