const ctx = document.getElementById('pie')
const bars = document.querySelector('.barchart')
// testing the code


// actual time 
const daymnth = new Date().getMonth()-1
const dayyear = new Date().getFullYear()

// making the wording consistent in months
let curmnth = daymnth
if (curmnth.length==1){
   curmnth= `0${daymnth}`
}else{
  curmnth=daymnth
}
// const mth = document.querySelector('#month').value
const ref = document.querySelector('.ref').innerText

// const yrr = document.querySelector('#yr').value
// getting the days in a month
const daysInMonth = (month,year)=>{
    return new Date(year, month,0).getDate()
}
const days = daysInMonth(daymnth,dayyear)
const lastfirstscenario =`${dayyear}-${curmnth}-${days}`
const firstscenario =`${dayyear}-${curmnth}-01`


$(document).ready(function(){
  $.ajax({
    url:'../db/getjson.php',
    type:'POST',
    data:{
      name:'',
      real:firstscenario,
      ref:ref,
      last:lastfirstscenario,
    },
    success:function(response){
    var output = JSON.parse(response);
    
    let xValues=[]
    let yValues=[]
    for (let m=1; m<=days;m++){
        xValues.push(m)
        yValues.push(0)
    }
    output.forEach(item=>{
        const yr = parseInt(item.time.slice(0,4));
        const mnth = parseInt(item.time.slice(6,7));
        const dy = parseInt(item.time.slice(8,10));
        if (yr===dayyear && mnth===daymnth){
            yValues[dy-1]=parseInt(item.daily_sales)
            // console.log(yValues[dy])
        }
    })
    // charting here
     new Chart(document.getElementById('dream'), {
        type: "line",
        data: {
        labels: xValues,
        datasets: [{
          backgroundColor: "rgba(0,0,0,1.0)",
          borderColor: "rgba(0,0,0,0.1)",
          data: yValues
        }]
        },
        options:{
          responsive:true,
          scales: {
        /* X axis in here*/
          x: {
              display: true,
              title: {
              display: true,
              text: ` Day of Month ${dayyear}/${daymnth}`,
              color: '#911',
              font: {
                  family: 'calibri',
                  size: 20,
                  weight: 'bold',
                  lineHeight: 1.2,
              },
              padding: {top: 20, left: 0, right: 0, bottom: 0}
              }
          },
          /* Y axis in here*/
          y: {
              display: true,
              title: {
              display: true,
              text: 'Amount(Ugx)',
              color: '#0000ff',
              font: {
                  family: 'calibri',
                  size: 20,
                  weight: 'bold',
                  lineHeight: 1.2,
              },
              padding: {top: 20, left: 0, right: 0, bottom: 0}
              }
          },
        /* Y axis in here*/
        }
      }}) 
      
// Charting ends here   
 
}
});
$("#month").keypress(function(event){
  const split = document.querySelector('#month').value
  // console.log(split.length)
  if (event.keyCode===13 && split.length===7){
    let cleaned =  split.replace('/','-')
    const yrr = split.slice(0,4)
    const mth = split.slice(5,7)
    const number_days = daysInMonth(parseInt(mth),parseInt(yrr))
    console.log(`year-${yrr} and month-${mth}`)
    const last =`${cleaned}-${number_days}`
    cleaned = `${cleaned}-01`
    console.log(cleaned)
    console.log(typeof(cleaned))
    console.log(last)
    
    
  $.ajax({
    type:'POST',
    url:'../db/getjson.php',
    data:{
      name:cleaned,
      ref:ref,
      last:last,
    },
    success:function(fetched){
      var output = JSON.parse(fetched);
      
      let xValues=[]
      let yValues=[]
      for (let m=1; m<=number_days;m++){
          xValues.push(m)
          yValues.push(0)
      }
      output.forEach(item=>{
        const yr = item.time.slice(0,4);
        const mnth = item.time.slice(6,7);
        const dy = parseInt(item.time.slice(8,10));
        if (yr === yrr && mnth=== mth){
            yValues[dy-1]=parseInt(item.daily_sales)
        }
      })
     
      let variable = document.querySelector('canvas')
      variable.remove()
      let motherelement = document.querySelector('.barchart')
      const canvas = document.createElement('canvas')
      canvas.classList.add("charts", "mb-2", "p-3", "bg-light", "border", "rounded-2")
      motherelement.appendChild(canvas)
      
      new Chart(document.querySelector('canvas'), {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: "rgba(0,0,0,1.0)",
            borderColor: "rgba(0,0,0,0.1)",
            data: yValues
          }]
        },
        options:{
          responsive:true,
          scales: {
            /* X axis in here*/
            x: {
                display: true,
                title: {
                display: true,
                text: ` Day of Month ${yrr}/${mth}`,
                color: '#911',
                font: {
                    family: 'calibri',
                    size: 20,
                    weight: 'bold',
                    lineHeight: 1.2,
                },
                padding: {top: 20, left: 0, right: 0, bottom: 0}
                }
            },
            /* Y axis in here*/
            y: {
                display: true,
                title: {
                display: true,
                text: 'Amount(Ugx)',
                color: '#0000ff',
                font: {
                    family: 'calibri',
                    size: 20,
                    weight: 'bold',
                    lineHeight: 1.2,
                },
                padding: {top: 20, left: 0, right: 0, bottom: 0}
                }
            },
      
          }
        }  
      }) 
    }
  });
  } 
});
});
        
