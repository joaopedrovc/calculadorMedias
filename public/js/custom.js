$(document).ready(function() {

    $('select[name="escola"]').on('change', function(){
        var escolaId = $(this).val();
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
        if(escolaId) {
            $.ajax({
                url: baseUrl+'escolas/getCursos/'+escolaId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },
                success: function(data) {
                    $('#tabela').css("visibility", "hidden");
                    $('select[name="curso"]').empty();
                    $('select[name="curso"]').append('<option value=""> --Curso-- </option>');
                        $.each(data, function(key, value){
                            $('select[name="curso"]').append('<option value="'+ key +'">' + value + '</option>');
                        });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="curso"]').empty();
            $('select[name="curso"]').append('<option value=""> --Curso-- </option>');
            $('#tabela').css("visibility", "hidden");
        }

    });

    $('select[name="curso"]').on('change', function(){
        var cursoId = $(this).val();
        if(cursoId) {
            //var escolaId = $('select[name="escola"]').val();
            document.location.href = '/cursos/getUCs/'+cursoId;
           
        } else {
           $('#tabela').css("visibility", "hidden");
        }

    });

    $(function () {
        $( ".nota" ).change(function() {
           var max = parseInt($(this).attr('max'));
           var min = parseInt($(this).attr('min'));
           if ($(this).val() > max)
           {
               $(this).val(max);
           }
           else if ($(this).val() < min)
           {
               $(this).val(min);
           }       
         }); 
     });

     $('#criarUCs').change(function () {
        if (!this.checked) {
            $('#novaUCdiv').css("visibility", "hidden");
        }
        else {
            $('#novaUCdiv').css("visibility", "visible");
        }
    });

    

     


});