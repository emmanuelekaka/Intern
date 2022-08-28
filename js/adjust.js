// const edit = document.querySelectorAll('.toEdit')
//This is in adjust part
const editName = document.querySelector('.querryName')
//div for editing user information
const adjust = document.querySelector('.adjust')
//link to the div that allows editing of information
const edituri = document.querySelectorAll('.edit')
//input field for update
const updateName = document.querySelector('.updateName')

// edituri.addEventListener('click',()=>{
//     editName.innerText = edit.innerText
//     //Below are under  
//     updateName.value = edit.innerText

//     adjust.style.display="initial"
// } )
edituri.forEach(item=>{
    item.addEventListener('click',()=>{
        const constraint = item.lastChild
        editName.innerText = constraint.innerText
        
    //Below are under  
        updateName.value = constraint.innerText

        adjust.style.display="initial"
} )
})


// searching
const min = document.querySelectorAll('.min')
const custome = document.querySelector('.custom')
custome.addEventListener('keyup',(e)=>{
    // console.log(e.target.value)
    getElement(e.target.value)
    


})
// min.forEach(item=>{
//         console.log(item.firstElementChild.textContent)
       
// })

const getElement = (name)=>{
    min.forEach(item=>{
        console.log(item.firstChild.textContent)
        if (name.toLowerCase().indexOf(item.firstElementChild.textContent.toLocaleLowerCase())!=-1){
            item.style.display="initial"
                     
        }else{
            
            item.style.display="none"  

        }



    })
    
   

}







