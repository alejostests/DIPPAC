<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Prueba de discalculia ideognostica 1 - 8 años</title>
</head>

<body>
    <div id="background">
        <br>
        <div id="iconTime">
            <img src="images/discalculia/clock.png">
            <div class="item">
                <h5 style="text-align: center;">¡Suerte!</h5>
            </div>
        </div>

        <div id="statement">
            <h1>Escribe el signo correspondiente <br>para realizar la operación:</h1>

        </div>

        <div id="operation">
            <h1>2 <label id="sign">_</label> 5 = 10</h1>
            <br>
            <div class="input-group-prepend" id="entry">
                <input type="text" class="form-control" id="inputNum">
            </div>
            <div id="buttons">
                <div id="finish">
                    <a id="continue" class="btn btn-primary disable-links" href="index.php?controlador=DyscalculiaIndex&accion=Lexical18">Continuar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function() {

        $(document).on('change', 'input', function(e) {

            // Get the existing data
            var currentData = localStorage.getItem('dippacAnswers');

            currentData = JSON.parse(currentData);

            var answer = e.target.value.normalize("NFD").replace(/ /g, "").replace(/[\u0300-\u036f]/g, "").toLowerCase();

            var isCorrect = answer == "x" || answer == "*" ? true : false;

            var answer2 = {
                type: 1,
                isCorrect: isCorrect,
                answer: answer,
                image: null,
                testName: "Prueba de discalculia ideognostica 2 - 8 años"
            };

            // Add new data to localStorage Array
            currentData[1] = answer2;

            localStorage.setItem('dippacAnswers', JSON.stringify(currentData));
        })
    })
</script>

</html>