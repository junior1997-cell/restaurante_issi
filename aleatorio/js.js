var x1 = 3745;
var x2 = 3585;
var cont = 10 ;
for (let i = 1; i <= cont; i++) { 

    var multiplicacion = x1 * x2;
    

    $('#aleatorio').append(''+
    '<tr>'+
        '<td>'+i+'</td>'+
        '<td>'+x1+'</td>'+
        '<td>'+x2+'</td>'+
        '<td>'+multiplicacion.toString().substr(0,2)+'<b>'+multiplicacion.toString().substr(2,4)+'</b>'+multiplicacion.toString().substr(6,2)+'</td>'+
        '<td>0,'+multiplicacion.toString().substr(2,4)+'</td>'+
    '</tr>');
    var extraer = multiplicacion.toString().substr(2,4);
    x1 = x2;
    x2 = multiplicacion.toString().substr(2,4);
     
}

