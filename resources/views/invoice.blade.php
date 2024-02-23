<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" type="text/css"> 

    <title>Invoice</title>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ asset('/img/companylogo.jpg') }}" alt="laravel daily" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice REF: 2024-#{{$invoice->id}}</h2>
            </td>
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>To:</h4></div>
                    <div>{{$invoice->client_name}}</div>
                    <div>{{$invoice->location}}</div>
                </td>
                <td class="w-half">
                    <div><h4>From:</h4></div>
                    <div>{{ config('app.name') }}</div>
                    <div>Finance Department</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <tr class="items">
                
                    <td>
                        {{$invoice->item}}
                    </td>
                    <td>
                        {{$invoice->description}}
                    </td>
                    <td>
                        {{$invoice->unit_price}}
                    </td>
               
            </tr>
        </table>
    </div>
 
    <div class="total">
        Total: $129.00 USD
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; My chronicles</div>
    </div>
</body>
</html>