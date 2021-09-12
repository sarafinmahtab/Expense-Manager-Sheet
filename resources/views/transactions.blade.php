<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <title>Transactions</title>
    <style>
        body {
            font-family: "Roboto", serif;
        }
        #update {
            color: rgb(76, 74, 78);
            text-decoration: none;
        }
        #delete {
            color: rgb(168, 29, 29);
            text-decoration: none;
        }
        table {
            border-collapse: collapse;
            width: 80%;
        }
        tr {
            border-bottom: 1px solid #ccc;
        }
        td {
            padding: 0.5%;
        }
        .transaction-list tbody tr td:nth-child(2), td:nth-child(4), td:nth-child(5), td:nth-child(6) {
            text-align: center;
        }
        .transaction-list tbody tr:nth-child(1) {
            font-weight: bold;
        }
        .transaction-list tbody tr:last-child {
            font-weight: bold;
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

    <table class="transaction-list">
        <tr>
            <td>ID</td>
            <td>Transaction Date</td>
            <td>Remarks</td>
            <td>Amount</td>
            <td>Projection</td>
            <td>Operations</td>
        </tr>
        @foreach ($transactionData as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->transaction_date }}</td>
            <td>{{ $transaction->remarks }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->projection }}</td>
            <td>
                <a class="fa fa-edit fa-lg"  id="update" href="{{ $transaction->id }}"></a>
                <a class="fa fa-trash fa-lg"  id="delete" href="delete/{{ $transaction->id }}"></a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td id="transaction_count">0</td>
            <td></td>
            <td>Sum Total</td>
            <td id="transaction_sum">0</td>
        </tr>
    </table>

    <script type="text/javascript">
        const sum = JSON.parse('{!! $sum !!}');
        const count = JSON.parse('{!! $count !!}');

        document.getElementById("transaction_count").textContent = count;
        document.getElementById("transaction_sum").textContent = sum;
    </script>
</body>
</html>
