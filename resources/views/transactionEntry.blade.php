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

    <h2>Enter a transaction</h2>

    <form action="transactions" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="Transaction amount" /> <br>
        <span style="color: rgb(223, 39, 39)">@error("amount")
            {{ $message }}
        @enderror</span>
        <br>
        <input type="date" name="transaction_date" placeholder="Transaction date" /> <br>
        <span style="color: rgb(223, 39, 39)">@error("transaction_date")
            {{ $message }}
        @enderror</span>
        <br>
        <input type="text" name="remarks" placeholder="Remarks" /> <br>
        <br>
        <input type="checkbox" name="projection" placeholder="Paid/Projected" /> Paid <br>
        <br>
        <button type="submit">Enter</button>
        <br>
    </form>

</body>
</html>
