<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Page</title>
</head>
<body>
    <h1>Transactions Page</h1>

    @foreach ($transactions as $transaction)
        <div><b>Transaction Title: </b>{{ $transaction->transaction_title }} </div>
        <div><b>Description: </b>{{ $transaction->description }} </div>
        <div><b>Status: </b>{{ $transaction->status }} </div>
        <div><b>Total Amount: </b>{{ $transaction->total_amount }} </div>
        <div><b>Transaction Number: </b>{{ $transaction->transaction_number }} </div>
        <hr>
    @endforeach
</body>
</html>