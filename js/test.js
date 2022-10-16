
const given = '2022/08'
let cleaned =  given.replace('/','-')
cleaned = cleaned
console.log(cleaned)
console.log(new Date())

const today = new Date().getMonth()
console.log(today-1)
const day = `${new Date()}`
console.log(day)
console.log(day.slice(8,10))
console.log(day.slice(11,15))

const daysInMonth = (month,year)=>{
    return new Date(year, month,0).getDate()
}
const days = daysInMonth(08,2022)
const last =`${cleaned}-${parseInt(days)}`
console.log(last)