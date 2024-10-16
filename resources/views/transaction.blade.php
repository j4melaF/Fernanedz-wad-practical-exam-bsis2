<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Page</title>
</head>
<body>
    <h1>TRANSACTION</h1>


    <div><b>Transaction Title: </b>{{ $transaction->transaction_title }} </div>
    <div><b>Description: </b>{{ $transaction->description }} </div>
    <div><b>Status: </b>{{ $transaction->status }} </div>
    <div><b>Total Amount: </b>{{ $transaction->total_amount }} </div>
    <div><b>Transaction Number: </b>{{ $transaction->transaction_number }} </div>
    
    <form action="{{ route('deleteTransaction', ['id' => $transaction->id]) }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this transaction?')">
        @method("DELETE")
        @csrf 
        <button type="submit">Delete Transaction</button>
    </form>

    <form action="{{ route('showTransactions') }}" method="GET">
        <button type="submit">Back to Transactions</button>
    </form>

    <form action="{{ route('editTransaction', ['id' => $transaction->id]) }}" method="GET">
        <button type="submit">Edit Transaction</button>
    </form>

    <hr>

    
</body>
</html>