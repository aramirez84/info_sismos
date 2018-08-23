var chart = AmCharts.makeChart("grafica3", {  
"type": "pie",
"theme" : "light",
"dataLoader": {  
"url": "get_dano_tipo",  
"format": "json",  
"showErrors": true,  
"noStyles": true,  
"async": true  
},  
"valueField": "total",
  "titleField": "tipo_dano",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});