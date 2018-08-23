var chart = AmCharts.makeChart("grafica6", {  
"type": "pie",
"theme" : "light",
"dataLoader": {  
"url": "get_dano_tipo_habitacion",  
"format": "json",  
"showErrors": true,  
"noStyles": true,  
"async": true  
},  
"valueField": "total",
  "titleField": "tipo_comercio",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});