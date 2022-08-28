const dream = document.getElementById('dream')
const ctx = document.getElementById('pie')
const month = document.querySelector('#month').value
// month.addEventListener('change',()=>{
//   month.value = 

// } )
const months={
  'Jan':31,
  'Feb':28,
  'Mar':31,
  'Apr':30,
  'May':31,
  'June':30,
  'July':31,
  'Aug':31,
  'Sept':30,
  'Oct':31,
  'Nov':30,
  'Dec':31,
  }
var xValues = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
var yValues = [100,200,150,0,400,700,100,200,150,0,400,700,100,200,150,0,400,700,100,200,150,0,400,700,100,200,150,0,400,700,100,200,150,0,400,700];

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
      x: {
        display: true,
        title: {
          display: true,
          text: ` Day of Month (${month})`,
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
      y: {
        display: true,
        title: {
          display: true,
          text: 'Amount(,000s)',
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
  }
)
