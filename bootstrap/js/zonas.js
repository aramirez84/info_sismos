var chart = AmCharts.makeChart("grafica2", {  
"type": "pie",
"theme" : "light",
"dataLoader": {  
"url": "get_dano_zona",  
"format": "json",  
"showErrors": true,  
"noStyles": true,  
"async": true  
},  
"valueField": "total",
  "titleField": "nombre",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});