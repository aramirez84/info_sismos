var chart = AmCharts.makeChart("grafica5", {  
"type": "pie",
"theme" : "light",
"dataLoader": {  
"url": "get_dano_nivel",  
"format": "json",  
"showErrors": true,  
"noStyles": true,  
"async": true  
},  
"valueField": "total",
  "titleField": "nombre_dano",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});