<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session()->has('add_result'))
        @if (session()->get('add_result'))
            <h4 style="color: green">Transaction added successfully</h4>
        @else
            <h4 style="color: red">Transaction add failed</h4>
        @endif
    @endif

    <a href="/transactions">Show Transactions</a>
    <br><br>

    <h2 id="title">Enter a transaction</h2>

    <form action="transactions" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $transactionData->id ?? -1 }}" >
        <input type="number" id="amount" name="amount" placeholder="Transaction amount" ><br>
        <span style="color: rgb(223, 39, 39)">@error("amount")
            {{ $message }}
        @enderror</span>
        <br>
        <input type="date" id="transaction_date" name="transaction_date" placeholder="Transaction date" ><br>
        <span style="color: rgb(223, 39, 39)">@error("transaction_date")
            {{ $message }}
        @enderror</span>
        <br>
        <input type="text" id="remarks" name="remarks" placeholder="Remarks" ><br>
        <br>
        <input type="checkbox" id="projection" name="projection" placeholder="Paid/Projected" > Paid<br>
        <br>
        <button id="submit_button" type="submit">Add Transaction</button>
        <br>
    </form>

    <script type="text/javascript">
        const transactionData = JSON.parse('{!! json_encode($transactionData ?? '') !!}');

        if (transactionData) {
            console.log(transactionData.amount);

            document.getElementById("title").textContent = "Update transaction ".concat(transactionData.id);
            
            document.getElementById("amount").setAttribute('value', transactionData.amount);
            document.getElementById("transaction_date").setAttribute('value', transactionData.transaction_date);
            document.getElementById("remarks").setAttribute('value', transactionData.remarks);
            
            if (transactionData.projection === 1) {
                document.getElementById("projection").setAttribute('checked', 'on');
            }

            document.getElementById("submit_button").textContent = "Update Transaction";
        }
    </script>
</body>
</html>
