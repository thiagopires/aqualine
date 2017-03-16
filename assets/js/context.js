$(".dropdown-toggle").dropdown();
var rows = $('#tabela tbody tr');
$('#pesquisa').keyup(function() {    
    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;
    
    rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});

$(function () {
  $('.datetimepicker').datetimepicker({
    locale: 'pt-br',
    format: 'DD/MM/YYYY'
  });
});

$('#estado').on('change', function(){
	$('#cidade').html('Carregando...').removeAttr('disabled');
	id = $(this).val();
	$.get('/aqualine/index.php/municipio/listarPorUf', { id: id }, function(data){
		$('#cidade').html(data);
	});
});

var ica_count = 0;
var ic_count = 0;

$('#ica-salvar').on('click',function(){
    ica_count++;
    html = '<li class="list-group-item" id="ica-' + ica_count +'">';
    htmlInput = '';

    $('.ica').each(function(){
        id = $(this).attr('id');
        content = $(this).val();
        label = $('label[for="'+id+'"]').html();
        html = html + '<div style="margin-right: 10px;"><strong>' + label + '</strong> ' + content + '</div>';
        htmlInput = htmlInput + '<input type="hidden" id="' + id + '_' + ica_count + '" name="' + id + '_' + ica_count + '" value="' + content + '" />';
        $(this).val('');
    });

    $('#ica-count').attr('value',ica_count);
    $('#ica-lista').append(html).append(htmlInput).append('</li>');
    $('#ica-modal').modal('toggle');
});

$('#ic-salvar').on('click',function(){
    ic_count++;
    html = '<li class="list-group-item" id="ic-' + ic_count +'">';
    htmlInput = '';

    $('.ic').each(function(){
        id = $(this).attr('id');
        content = $(this).val();
        label = $('label[for="'+id+'"]').html();
        html = html + '<div style="margin-right: 10px;"><strong>' + label + '</strong> ' + content + '</div>';
        htmlInput = htmlInput + '<input type="hidden" id="' + id + '_' + ic_count + '" name="' + id + '_' + ic_count + '" value="' + content + '" />';
        $(this).val('');
    });

    $('#ic-count').attr('value',ic_count);
    $('#ic-lista').append(html).append(htmlInput).append('</li>');
    $('#ic-modal').modal('toggle');
});