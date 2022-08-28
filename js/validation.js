//User login
const loginform =document.forms['form']
const username= loginform.querySelector('input[name="username"]')
const password= loginform.querySelector('input[name="password"]')
const error= document.querySelector('.error')

loginform.addEventListener('submit', (e)=>{
    const message =[]
    if (!(username.value||password.value)){
        message.push('Please fill out all fields')
    }
    if(message.length>0){
        e.preventDefault()
        error.innerText = message.join(',')
        error.backgroundColor="#F44336"
        error.borderRadius = "5px"
        error.padding = "5px"
    }
})


