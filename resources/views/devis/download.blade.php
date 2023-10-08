<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Devi  {{$devi->id}}</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        body {
            position: relative;
            width: 18cm;
            margin: 0 auto;
            color: #000;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        h1 {
            border-bottom: 2px solid #007acc;
            color: #007acc;
            font-size: 2em;
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }

        #company {
            text-align: right;
            float: right;
        }

        #project {
            float: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #f2f2f2;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #007acc;
            color: #fff;
            font-weight: bold;
        }

        table td {
            border-bottom: 1px solid #007acc;
        }

        table .service, table .desc {
            text-align: left;
        }

        table td.unit, table td.qty, table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 2px solid #007acc;
        }

        #notices .notice {
            color: #007acc;
            font-size: 1.2em;
            margin-top: 10px;
        }

        footer {
            color: #007acc;
            width: 100%;
            text-align: center;
            border-top: 1px solid #007acc;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
<header class="clearfix">
    <h1>Devis - {{$devi->id}}</h1>
    <div id="company" class="clearfix">
        <div><span>NOM PATIENT :</span> {{ $client->nom }}  </div>
        <div><span>PRENOM PATIENT :</span>  {{ $client->prenom}}</div>
        <div><span>ADRESSE :</span> {{ $client->adresse }}</div>
    </div>
    <div id="project">
        <div>Dr Fatima ASSANI AGBANRIN</div>
        <div>Cabinet dentaire ABOLORÊ,<br />Cotonou, Haie Vive</div>
        <div>TELEPHONE : (229) 20 22 03 42</div>
        <div>WHATSAPP : (229) 45 72 72 72</div>
        <div>cabinetdentaire.abolore@outlook.com</a></div>
        <div>IFU 3202256943894</a></div>
        
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">NUMERO DENT</th>
            <th class="desc">NATURE DE L'ACTE</th>
            <th class="total">HONORAIRES</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($item_devis as $item)
            <tr>
                <td class="service">{{ $item->numero_dent}}</td>
                <td class="desc">{{ $item->code->nom}}</td>
                <td class="total">{{ $item->code->prix}} F.CFA</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{$devi->total}} F.CFA</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">
        <div>DATE DEVIS:</div>
        <div class="notice">{{$devi->created_at}}</div>
    </div>
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>
