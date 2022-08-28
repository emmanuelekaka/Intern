const  highlight = document.querySelectorAll('.side-item2>li>a')
highlight.forEach(item=>{
    item.addEventListener('click',()=>{
        item.style.color='#ffffff'
    })
})