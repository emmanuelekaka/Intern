
//This is in adjust part
const editName = document.querySelector('.querryName')
//div for editing user information
const adjust = document.querySelector('.adjust')
//link to the div that allows editing of information
const edituri = document.querySelectorAll('.edit')
// console.log(edituri)
//input field for update
const updateName = document.querySelector('.updateName')


edituri.forEach((item)=>{
    item.addEventListener('click',()=>{
        const constraint = item.lastChild;
        // console.log("HEy u")
        editName.innerText = constraint.innerText;
        //Below are under  
        updateName.value = constraint.innerText;
});
});







