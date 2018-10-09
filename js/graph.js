var chart;
var chart_volume;

function graph_point(min, name, max){
  chart = new CanvasJS.Chart("chartContainer",
  {
    title:{
    text: "Graph " + name + "m",
  },
  axisY:{
   minimum: min,
   maximum: max
  },
  data: [ 
    {
      type: "area",
      color:"#369EAD",
      axisXIndex: 0, //defaults to 0
      dataPoints: []
    },
    {
    type: "line",
    markerType: "none",
    axisXIndex: 1, //defaults to 0
    color:"#C24642",
    dataPoints: []
  }
  ]
  });

  chart.render();
}

function add_to_chart(jour, mois, annee, point, moy){
  chart.data[0].addTo("dataPoints", {x: new Date(annee, mois, jour), y: point });
  chart.data[1].addTo("dataPoints", {x: new Date(annee, mois, jour), y: moy });
}

function graph_volume(){
  chart_volume = new CanvasJS.Chart("chartContainerVolume",
  {
    title:{
    text: "Graph Volume",
  },
  dataPointMaxWidth: 20,
  data: [
    {
      type: "column",
      color:"#369EAD",
      axisXIndex: 0, //defaults to 0
      dataPoints: []
    }
  ]
  });

  chart_volume.render();
}

function add_to_chartvol(jour, mois, annee, nombre){
  chart_volume.data[0].addTo("dataPoints", {x: new Date(annee, mois, jour), y: nombre});
}
