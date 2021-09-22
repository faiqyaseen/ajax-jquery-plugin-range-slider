<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #slider-range .ui-slider-handle {
            outline: 0;
            background: peru;
            border-radius: 10%;
            /* top: -.6em; */
        }

        #slider-range.ui-slider-horizontal {
            /* top: 1em; */
            left: 5%;
            height: 0.6em;
            width: 90%;
            border: none;
            background: #ccc ;
        }
        #slider-range .ui-widget-header {
            background: lightslategrey;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
</head>

<body>
    <div class="container">

        <header>
            <div class="row justify-content-center bg-warning p-5">
                <div class="col-md-6">
                    <h3>AJAX RANGE SLIDER SEARCH</h3>
                </div>
            </div>
        </header>

        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h3>Age Between <span id="age"></span></h3>
            </div>
            <div id="slider-range" class="col-md-8">

            </div>
        </div>

        <div class="row mt-2 py-2 justify-content-center">
            <div class="col-md-10">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody id="t-body">

                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            var v1 = 15;
            var v2 = 25
            $("#slider-range").slider({
                range: true,
                min: 13,
                max: 30,
                values: [v1, v2],
                slide: function(event, ui) {
                    $("#age").html(ui.values[0] + " - " + ui.values[1]);
                    v1 = ui.values[0];
                    v2 = ui.values[1];
                    loadTable(v1, v2)
                }
            });
            $("#age").html($("#slider-range").slider("values", 0) +
                " - " + $("#slider-range").slider("values", 1));

            function loadTable(range1, range2) {
                $.ajax({
                    url: "code.php",
                    type: "POST",
                    data: {
                        initialRange: v1,
                        finalRange: v2
                    },
                    success: function(data) {
                        console.log(data);
                        $("#t-body").html(data);
                    }
                })
            }
            loadTable(v1, v2)
        })
    </script>
</body>

</html>