// Highlighting of the nav items  in the sidebar on click
const activepage = window.location;
const  highlight = document.querySelectorAll('.side-item2>li>a');
highlight.forEach(item=>{

        if (item.href.includes(activepage)){
            item.style.color='#ffffff';
        }else{
            item.style.color='#ff0000';
        }
});