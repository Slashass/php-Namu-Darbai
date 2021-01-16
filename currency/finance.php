<?php
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $string = $from . "_" . $to;

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=$string&compact=ultra&apiKey=6e6c5f9a63ea5137d287",
        CURLOPT_RETURNTRANSFER => 1
    ));
    $response = curl_exec($curl);
    $response = json_decode($response, true);
    $rate = $response[$string];

    $total = $rate * $amount;
    echo "$amount $from = $total $to";
    // print_r($total);
}


?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
    <form method="POST">
        <div class="form-group">
            <label>From</label>
            <input name="from" class="form-control">
        </div>
        <div class="form-group">
            <label>To</label>
            <input name="to" class="form-control">
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input name="amount" class="form-control">
        </div>
        <input type="submit" name="submit" class="btn btn-success" value="Convert">
    </form>
</div>