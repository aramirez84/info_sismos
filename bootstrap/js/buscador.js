$(function()
{
    $('select').change(function (){
        valor = $(this).val();
        opcion = $(this).attr('id');
        buscar(valor,opcion);
    });
});

function buscar(valor,opcion)
{
    insert_pre('box-caja-1');
    $.post('index.php/principal/busca_info',
    {
      valor:valor,
      opcion:opcion
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