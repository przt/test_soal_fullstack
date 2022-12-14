<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form input</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>ADD LOAN</h1>
        <table class="table">
            <form method="post" action="loan_process.php" id="save-loan">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" class="form-control" placeholder="Name"></td>
                    </tr>
                    <tr>
                        <td>Private Number</td>
                        <td><input type="number" name="private_number" class="form-control" placeholder="Private Number"></td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td><input type="email" name="email" class="form-control" placeholder="email"></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><input type="date" name="date" class="form-control" placeholder="Date"></td>
                    </tr>
                    <tr>
                        <td>
                            <b>BOOK CART</b>
                        </td>
                        <td align="right">
                            <button type="button" class="btn btn-success btn-lg" onclick="addField()">Add</button>
                        </td>
                    </tr>

                </table>
                <br>

                <table class="table" id="table_loan">
                    <thead>
                        <th>
                            BOOK TITLE
                        </th>
                        <th>
                            PRICE PER DAY
                        </th>
                        <th>
                            DAYS
                        </th>
                        <th>
                            TOTAL
                        </th>
                    </thead>
                    <tbody id="tb_book">

                        <tr id="row0">
                            <td><select name="id_book[]" id="id_book0" class="form-control select_book">
                                    <?php
                                    include 'conn.php';
                                    $data = mysqli_query($mysqli_connect, "select * from book");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <option value="<?php echo $d['id']; ?>"><?php echo $d['tittle']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="price_perday[]" class="form-control" id="ppd0" placeholder="Price Per Day" readonly>
                            </td>
                            <td>
                                <input type="number" name="day[]" id="day0" class="form-control day_loan" placeholder="Day">
                            </td>
                            <td>
                                <input type="number" name="sub_total[]" id="subtotal0" class="form-control" placeholder="Subtotal" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <tr>
                        <td colspan="4">
                            <b>GRAND TOTAL</b>
                        </td>
                        <td align="right">
                            <div id="grandtotal">
                                <input type="text" name="grandTotal" id="grandTotal" class="form-control" placeholder="Grand Total" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <button type="button" id="save" class="btn btn-primary btn-lg">SAVE</button>
                        </td>
                    </tr>
                </table>
            </form>
        </table>
    </div>

</body>
<script>
    var row = 0;

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();

        var values = $("input[name='sub_total[]']")
            .map(function() {
                return $(this).val();
            }).get();

        var grandTotal = 0;
        const arrayA = values.map(sweetItem => {
            return grandTotal = parseInt(sweetItem) + parseInt(grandTotal)
        });

        document.getElementById('grandTotal').value = grandTotal;
    });

    $(document).on('change', '.select_book', function() {
        var id = '#' + $(this).attr("id");
        var id_subtotal = 'id_book' + id.slice(-1);
        var id_price_per_day = 'ppd' + id.slice(-1);


        var value = document.getElementById(id_subtotal).value;
        $.ajax({ //create an ajax request to display.php
            url: "get_data_book.php",
            dataType: "text",
            type: 'POST',
            data: {
                id: value
            },
            success: function(data) {
                var dataO = JSON.parse(data);
                document.getElementById(id_price_per_day).value = dataO[0].price_per_day;
                //alert(response);
            }

        });
    });

    $(document).on('keyup', '.day_loan', function() {
        var id = $(this).attr("id");
        var value = document.getElementById(id).value;
        var id_subtotal = 'subtotal' + id.slice(-1);
        var id_ppd = 'ppd' + id.slice(-1);
        var valuePrice = document.getElementById(id_ppd).value

        var calculate = value * valuePrice;
        document.getElementById(id_subtotal).value = calculate;

        var values = $("input[name='sub_total[]']")
            .map(function() {
                return $(this).val();
            }).get();

        var grandTotal = 0;
        const arrayA = values.map(sweetItem => {
            return grandTotal = parseInt(sweetItem) + parseInt(grandTotal)
        })

        document.getElementById(id_subtotal).value = calculate;
        document.getElementById('grandTotal').value = grandTotal;
    });

    function addField() {
        row++
        var formField  = `<tr id="row${row}">
                        <td><select name="id_book[]" id="id_book${row}" class="form-control select_book">
                                <?php
                                include 'conn.php';
                                $data = mysqli_query($mysqli_connect, "select * from book");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?php echo $d['id']; ?>"><?php echo $d['tittle']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="price_perday[]" class="form-control" id="ppd${row}" placeholder="Price Per Day" readonly>
                        </td>
                        <td>
                            <input type="number" name="day[]" class="form-control day_loan" id="day${row}" placeholder="Day">
                        </td>
                        <td>
                            <input type="number" name="sub_total[]" class="form-control" id="subtotal${row}" placeholder="Subtotal" readonly>
                        </td>
                        <td>
                         <button type="button" class="btn btn-danger btn-sm btn_remove" id="${row}">X</button>
                        </td> 
                    </tr>`


        $("#tb_book").append(formField);
    }

    $('#save').on('click', function add(event) {
        event.preventDefault();
        $('#save-loan').submit();
    });

    $('#save').click(function(){
        var data = $('#save-loan').serialize();
        console.log(data);
    })
</script>

</html>