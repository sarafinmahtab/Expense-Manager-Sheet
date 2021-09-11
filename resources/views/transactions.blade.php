<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions</title>
    <style>
        a.delete_transaction {
            position: absolute;
            right: 0px; top: 0px; width:20px;
            background-color: #FFF; color: black;
            margin-top:-15px; margin-right:-15px; border-radius: 20px;
            padding-left: 3px; padding-top: 1px;
            cursor:pointer; z-index: -1;
            font-size:16px; font-weight:bold;
        }
    </style>
</head>
<body>
    @if(session()->has('update_result'))
        @if (session()->get('update_result'))
            <h4 style="color: green">Transaction updated successfully</h4>
        @else
            <h4 style="color: red">Transaction update failed</h4>
        @endif
    @endif

    @if(session()->has('delete_result'))
        @if (session()->get('delete_result'))
            <h4 style="color: green">Transaction deleted successfully</h4>
        @else
            <h4 style="color: red">Transaction delete failed</h4>
        @endif
    @endif

    <h4>Elapsed time -> {{ $elapsedTime }}</h4>

    <a href="/entry">Add Transaction</a>
    <br><br>

    <table>
        <tr>
            <td>ID</td>
            <td>Amount</td>
            <td>Transaction Date</td>
            <td>Projection</td>
            <td>Remarks</td>
            <td>Operations</td>
        </tr>
        @foreach ($transactionData as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->transaction_date }}</td>
            <td>{{ $transaction->projection }}</td>
            <td>{{ $transaction->remarks }}</td>
            <td><a class="delete" id="delete" href="delete/{{ $transaction->id }}">&#x274C;</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
