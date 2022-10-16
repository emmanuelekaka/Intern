//form selection
const form = document.forms['regi']
//input boxes
const fname = form.querySelector('input[name="fname"]')
const lname = form.querySelector('input[name="lname"]')
const tel = form.querySelector('input[name="tel"]')
const email = form.querySelector('input[name="email"]')
const nin = form.querySelector('input[name="nin"]')
const locality = form.querySelector('input[name="locality"]')
// locality.style.border ="2px solid green"
// console.log(locality.value)
const username = form.querySelector('input[name="username"]')
const passcode = form.querySelector('input[name="passcode"]')
//errorclasslist
const setError = (element)=>{
    element.style.border="2px solid red"
    // console.log(element.value)
}
//clearError
const clearError =(element)=>{
    element.style.border="3px solid #76FF03"
    // console.log(element.value)
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
        setError(fname)
    }else{
        clearError(fname)
    }
    if(!lnamevalue){
        k+=1
        setError(lname)
        
    }else{
        clearError(lname)
    } 
    if(!telvalue){
        k+=1
        setError(tel)
        
    }else{
        clearError(tel)
    }
    if(!emailvalue){
        k+=1
        setError(email)
        
    }else{
        clearError(email)
    }
    if(!ninvalue){
        k+=1
        setError(nin)
        
    }else{
        clearError(nin)
    }
    if(!localityvalue){
        k+=1
        setError(locality)
        
    }else{
        clearError(locality)
    } 
    if(!usernamevalue){
        k+=1
        setError(username)
        
    }else{
        clearError(username)
    } 
    if(!passcodevalue){
        k+=1
        setError(passcode) 
    }else{
        clearError(passcode)
    }
    return k

}

form.addEventListener('submit',(e)=>{
    
    if(validate()===0){
        console.log("Passed the condition")

    }else{
        console.log("Hey you")
        e.preventDefault()
    }
})
