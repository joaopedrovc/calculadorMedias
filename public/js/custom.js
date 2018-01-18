$(document).ready(function() {
    $('#divLoadFile').hide();
    listenerNota();
    if($('select[name="escola"]').val() <=0) {
        $('#tabela').hide();
    }
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
            var getUrl = window.location;
            var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
            window.location.replace(baseUrl);
            $('select[name="curso"]').empty();
            $('select[name="curso"]').append('<option value=""> --Curso-- </option>');
            $('select[name="ramo"]').empty();
            $('select[name="ramo"]').append('<option value=""> --Ramo-- </option>');
            $('#tabela').css("visibility", "hidden");
        }

    });

    $('select[name="curso"]').on('change', function(){
        var cursoId = $(this).val();
        if(cursoId) {
            //var escolaId = $('select[name="escola"]').val();
            document.location.href = '/cursos/getUCs/'+cursoId;
            
           
        } else {
            $('select[name="ramo"]').empty();
            $('select[name="ramo"]').append('<option value=""> --Ramo-- </option>');
            $('#tabela').css("visibility", "hidden");
        }

    });

    $('select[name="ramo"]').on('change', function(){
        var ramoId = $(this).val();
        if(ramoId) {
            //var escolaId = $('select[name="escola"]').val();
            document.location.href = '/cursos/getUCsPorRamo/'+ramoId;
           
        } else {
           $('#tabela').css("visibility", "hidden");
           var cursoId = $('select[name="curso"]').val();
           document.location.href = '/cursos/getUCs/'+cursoId;
        }

    });

     

     $('#criarUCs').change(function () {
        if (!this.checked) {
            $('#novaUCdiv').css("visibility", "hidden");
        }
        else {
            $('#novaUCdiv').css("visibility", "visible");
        }
    });

    $('#checkLoadFile').change(function () {
        if (!this.checked) {
            $('#divLoadFile').hide();
            $('#divEscolhaManual').show();
        }
        else {
            $('#divEscolhaManual').hide();
            $('#divLoadFile').show();
        }
    });

    $('#fileToLoad').change(function (){
        $('#btnUpload').prop("disabled", false);
    });
    

    

    

     


});



 function removeLine(id) {
    $('#row' + id).remove();
}


function checkIfExists(id) {
    if($("#" + name).length == 0) {
        //it doesn't exist
      }
}

function validateFormOnSubmit(theForm) {
    var nome = theForm.nome.value;
    var ects = theForm.ects.value;
    var id = theForm.id.value;
    if(nome == "") {
        alert("Nome da UC não pode estar vazio\n");
        return false;
    }
    if(ects < 1 || ects > 20) {
        alert("Numero de ects errado\n");
        return false;
    }
    if(id < 2000 || id > 2050) {
        alert("ID tem de ser entre 2000 e 2050\n");
        return false;
    }
    if($('#row' + id).length != 0) {
        alert("ID já existe\n");
        return false;
      }

    $('#myTable tr:last').after('<tr id="row'+id+'"><td>'+ id +'</td><td>-----</td><td>'+ nome +'</td><td>'+ ects +' ECTS </td><td><input id="nota" class="nota" type="number" name="NEW_'+ ects +'" min="0" max="20"></td><td><button onclick="removeLine('+ id +')" type="button" class="btn btn-danger">X</button></td></tr>');
    //Reativar listener
    listenerNota();

    $('#novaUCdiv').css("visibility", "hidden");
    $('#criarUCs').prop('checked', false);
}

function listenerNota() {
    $(".nota").on("change",  function() {
        //Entrei
       var max = parseInt($(this).attr('max'));
       var min = parseInt($(this).attr('min'));
       var valor = $(this).val();
       if (valor > max)
       {
            valor = max;
       }
       else if ($(this).val() < min)
       {
            valor = min;
       }
    
       $(this).attr("value", valor);
       $(this).val(valor);
     }); 
}

function saveTable() {
    var element = document.getElementById("myTable");
    var html = element.outerHTML;
    //html = $('#myTable').html();
    var hiddenElement = document.createElement('a');
    
    hiddenElement.href = 'data:attachment/text,' + encodeURI(html);
    hiddenElement.target = '_blank';
    hiddenElement.download = 'tabelamedia.txt';
    hiddenElement.click();
    //document.getElementById("tabela").innerHTML = html;
}

function loadTable() {
    var fileInput = $('#fileToLoad');
    if (!window.FileReader) {
        alert('Your browser is not supported');
        return false;
    }
    var input = fileInput.get(0);

    // Create a reader object
    var reader = new FileReader();
    if (input.files.length) {
        var textFile = input.files[0];
        // Read the file
        reader.readAsText(textFile);
        // When it's loaded, process it
        $(reader).on('load', processFile);
        //document.getElementById("tabela").innerHTML = textFile;
    } else {
        alert('Please upload a file before continuing')
    } 
}

function processFile(e) {
    var file = e.target.result;
    if (file && file.length) {
        document.getElementById("myTable").innerHTML = file;
        //$('#tabela').css("visibility", "visible");
        $('#tabela').show();
        listenerNota();
        
    }
}


