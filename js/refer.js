const generateReferalCode = ()=>{
    const choice ='a1A0bB7cC9Dd4EeF8fGgHh2Iij3JkK5lLmMnNoOpP6qQR0rsSTtUuVvWwxXyYzZ'
    let referalCodeEcho=''
    for(let num=1;num<7;num++){
     referalCodeEcho +=choice[Math.floor(Math.random()*choice.length)]
    }
    return referalCodeEcho

}
const addReferal = document.querySelector('.gen')
const include = document.querySelector('input[name="ref"]')

addReferal.addEventListener('click', (e)=>{
    include.value=generateReferalCode()

})
