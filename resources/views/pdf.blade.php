<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<style>
.w-full {
    width: 100%;
}

.w-half {
    width: 50%;
}

.margin-top {
    margin-top: 1.25rem;
}

.footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
}

table {
    width: 100%;
    border-spacing: 0;
}

table.plans {
    border: 0.5px solid darkgray;
    border-color: black;
    font-size: 0.875rem;
}

table.plans tr {
    background-color: rgb(96 165 250);
}

table.plans th {
    color: #ffffff;
    padding: 0.5rem;
    border: 0.5px solid darkgray;
}

table.plans td {
    border: 0.5px solid darkgray;
}

table tr.info {
    background-color: rgb(241 245 249);
}

table tr.info td {
    padding: 0.5rem;
}

.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}

.one-quarter{
    width: 25%;
    font-size: 18px;
}

</style>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="image/logo.jpg" width="200" />
            </td>
        </tr>
    </table>

    <div class="row">
        @foreach($users as $user)
        <table class="user">
        <tr>
            <td class="one-quarter">Subscriber Name:</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td class="one-quarter">Subscriber Email:</td>
            <td>{{$user->email}}</td>
        </tr>
        </table>
        @endforeach
    </div>

    <div class="margin-top">
        @foreach($subscriptions as $subscription)
        <table class="plans">
            <tr>
                <th>Plan Name</th>
                <th>Price</th>
                <th>Trials Start At</th>
            </tr>
            <tr class="info">
                <td>{{ $subscription->plan->title }} Plan</td>
                <td>RM{{ $subscription->plan->price }}</td>
                <td>{{ $subscription->plan->created_at }}</td>
            </tr>
        </table>
        
        <div class="total">Total Purchase: RM{{ $subscription->plan->price }}</div>
        @endforeach
    </div>

    <div class="footer margin-top">
        <div>Thank you for your purchasing</div>
        <div>&copy; Hong Fong Group Trading</div>
    </div>
</body>
</html>