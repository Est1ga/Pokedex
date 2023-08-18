<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<div class="principal">
    <div class="busca">
        <section class="caixa-search">
            <input class="caixa-texto" type="text" name="" placeholder="Pesquisar...">
            <button class="botao-search"><i class="fas fa-search"></i></button>
            <button class="next" value="0">Next</button>
        </section>
    </div>
    <div id="conteudo"></div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $(".botao-search").on("click",function(){
        let param = $(".caixa-texto").val()
        $.ajax({
            url:"api_pokemon.php",
            method: 'POST' ,
            data:{param:param},
            success: function(result){
                $("#conteudo").html(result);
                $(".caixa-texto").val('').attr("placeholder", "Pesquisar...");

            }
        });
    });


$(".next").on("click",function(){
        let param = $(".next").val();
        param = parseInt(param) +1;
        $(".next").val(param)
        $.ajax({
            url:"api_pokemon.php",
            method: 'POST' ,
            data:{param:param},
            success: function(result){
                $("#conteudo").html(result);
            }
        });
    });
});
</script>