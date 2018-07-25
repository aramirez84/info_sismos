function buscar_particular()
{
    insert_pre('box-caja-1');
    var valor = $('#caja_busqueda').val();
    var avanzado=$('#select_avanzado').val();
    $.get('buscar',
    {
      val:valor,
      opcion:avanzado
    },function(data)
    {
        $('#box-caja-1').animate({'opacity':'1'}, 800);
        $('#box-caja-1').html(data);
    });
}
function insert_pre(id_box)
{
    $('#'+id_box).html('<div class="preloader-box"></div>');
}