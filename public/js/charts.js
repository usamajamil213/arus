  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer1",
    {
      data: [
      {
        type: "doughnut",
        innerRadius: 100,
        indexLabelPlacement: "outside",
         startAngle: 30,  //vary the angle here.
        dataPoints: [
          { y: 71, label: "71",color: "lime" },
          { y: 55, label: "",color: "grey" }
        ]
      }
      ]
    });

    chart.render();

  var chart = new CanvasJS.Chart("chartContainer2",
    {
      backgroundColor: "transparent",
      data: [
      {
        type: "doughnut",
        innerRadius: 82,        
        indexLabelPlacement: "outside",
         startAngle: 60,  //vary the angle here.
        dataPoints: [
          { y: 55, label: "55",color: "green" },
          { y: 55, label: "" ,color: "grey"}
        ]
      }
      ]
    });

    chart.render();


  var chart = new CanvasJS.Chart("chartContainer3",
    {
      backgroundColor: "transparent",
      data: [
      {
        type: "doughnut",
        innerRadius: 62,        
        indexLabelPlacement: "outside",
         startAngle: 90,  //vary the angle here.
        dataPoints: [
          { y: 55, label: "55",color: "green" },
          { y: 55, label: "" ,color: "grey"}
        ]
      }
      ]
    });

    chart.render();  

  var chart = new CanvasJS.Chart("chartContainer4",
    {
      backgroundColor: "transparent",
      data: [
      {
        type: "doughnut",
        innerRadius: 47,        
        indexLabelPlacement: "outside",
         startAngle: 120,  //vary the angle here.
        dataPoints: [
          { y: 55, label: "55",color: "green" },
          { y: 55, label: "" ,color: "grey"}
        ]
      }
      ]
    });

    chart.render();        

  
  }
