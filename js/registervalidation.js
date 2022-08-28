//form selection
const form = document.forms['register']
//input boxes
const fname = form.querySelector('input[name="fname"]')
const lname = form.querySelector('input[name="lname"]')
const tel = form.querySelector('input[name="tel"]')
const email = form.querySelector('input[name="email"]')
const nin = form.querySelector('input[name="nin"]')
const locality = form.querySelector('input[name="locality"]')
const username = form.querySelector('input[name="username"]')
const passcode = form.querySelector('input[name="passcode"]')
//errorclasslist
const setError = (element, message)=>{
    
    const par = element.parentElement
    const errordisplay =par.querySelector('.empty')
    // par.appendChild(inputControl)
    errordisplay.innerText = message
    errordisplay.style.color='red'
    element.style.border="2px solid red"

}
//clearError
const clearError =(element)=>{
     // inputControl.innerText=message
    const par = element.parentElement
    const errordisplay =par.querySelector('.empty')
    // par.appendChild(inputControl)
    errordisplay.innerText = ''
    element.style.border="3px solid #76FF03"

}
//error boxes
//validation
const validate = ()=>{
    let k=0
    const fnamevalue =fname.value.trim() 
    const lnamevalue =lname.value.trim() 
    const telvalue =tel.value.trim() 
    const emailvalue =email.value.trim() 
    const ninvalue =nin.value.trim() 
    const localityvalue =locality.value.trim() 
    const usernamevalue =username.value.trim() 
    const passcodevalue =passcode.value.trim()
    if(!fnamevalue){
        k+=1
        setError(fname,'first name required')
    }else{
        clearError(fname)
    }
    if(!lnamevalue){
        k+=1
        setError(lname,'last name required')
        
    }else{
        clearError(lname)
    } 
    if(!telvalue){
        k+=1
        setError(tel,'phone number required')
        
    }else{
        clearError(tel)
    }
    if(!emailvalue){
        k+=1
        setError(email,'email name required')
        
    }else{
        clearError(email)
    }
    if(!ninvalue){
        k+=1
        setError(nin,'nin required')
        
    }else{
        clearError(nin)
    }
    if(!localityvalue){
        k+=1
        setError(locality,'location required')
        
    }else{
        clearError(locality)
    } 
    if(!usernamevalue){
        k+=1
        setError(username,'username required')
        
    }else{
        clearError(username)
    } 
    if(!passcodevalue){
        k+=1
        setError(passcode,'passcode required') 
    }else{
        clearError(passcode)
    }
    return k

}

form.addEventListener('submit',(e)=>{
    
    if(validate()===0){

    }else{
        e.preventDefault()
    }
})
