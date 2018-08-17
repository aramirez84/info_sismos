var chart = AmCharts.makeChart("grafica1", {  
"type": "pie",
"theme" : "light",
"dataLoader": {  
"url": "get_dano_deleg",  
"format": "json",  
"showErrors": true,  
"noStyles": true,  
"async": true  
},  
"valueField": "total",
  "titleField": "nombre_delegacion",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});