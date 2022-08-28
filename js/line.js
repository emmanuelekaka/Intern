const dream = document.getElementById('dream')
const ctx = document.getElementById('pie')
const mth = document.querySelector('#month').value

const yr = document.querySelector('#yr').value


$(document).ready(function(){
  $.ajax({
    url:'../db/getjson.php',
    type:'GET',
    success:function(response){
    var data = JSON.parse(response);
    let list=[];
    // getting the days in a month
    const daysInMonth = (month,year)=>{
        return new Date(year, month,0).getDate()
    }
    const days = daysInMonth(yr,mth)
    let xValues=[]
    let yValues=[]
    for (let m=1; m<=days;m++){
        xValues.push(m)
    }
    for (let m=1; m<=days;m++){
        yValues.push(0)
    }
    data.forEach(item=>{
        const yr = parseInt(item.time.slice(0,4));
        const mnth = parseInt(item.time.slice(6,7));
        const dy = parseInt(item.time.slice(9,10));
        if (item.referal ==="To04fc" && yr===2022 && mnth===8){
            yValues[dy]=parseInt(item.daily_sales)
        }
    })
    // charting here
    new Chart(dream, {
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
            text: ` Day of Month (2022/08)`,
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
        /* X axis in here*/

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


    }  
  }
  // Charting ends here
)       
}
});
});
        
