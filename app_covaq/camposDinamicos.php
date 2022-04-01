<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="javascript/jquery/bootstrap.css">
    <script src="javascript/jquery/bootstrap.min.js"></script>
    <script src="javascript/jquery/jquery.js"></script>
    <script src="javascript/jquery/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>

    <div class="container">
        <a class="btn btn-primry" href="" id="addInput">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Adicionar Campo
        </a>
        <br>
        <div id="dynamicDiv">
            <p>
                <input type="text" id="inputteste" size="20" value= "" placeholder="">
                <a class="btn btn-danger" href="" id="remInput">
                    Remover Campo
                </a>
            </p>
        </div>
    
        <script>
            $(function () {
                var scntDiv = $('#dynamicDiv');

                $(document).on('click', '#addInput', function () {
                    $('<p>'+
                        '<input type="text" id="inputteste" size="20" value= "" placeholder="">' +
                        '<a class="btn btn-danger" href="javascript(0)" id="remInput">' +
                            '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                            'Remover Campo' +
                        '</a>' + 
                    '</p>').appendTo(scntDiv);
                    return false;
                });

                $(document).on('click', '#remInput', function () {
                    $(this).parent('p').remove();
                    return false;
                });
            });
        </script>
    </div>
</body>
</html>