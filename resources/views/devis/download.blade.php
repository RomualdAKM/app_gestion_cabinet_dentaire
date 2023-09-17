<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Devi</title>
    {{-- <link rel="stylesheet" href="style.css" media="all" /> --}}
  </head>
  <style>
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 19cm;
  height: 29.7cm;
  margin: 0 auto;
  color: #001028;
  background: #FFFFFF;
  font-family: Arial, sans-serif;
  font-size: 12px;
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
  </style>
  <body>
    <header class="clearfix">
      {{-- <div id="logo">
        <img src="logo.png">
      </div> --}}
      <h1>Devi N'{{$devi->id}} </h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">

        <div><span>NOM CLIENT</span> {{ $client->nom }}  </div>
        <div><span>PRENOM CLIENT</span>  {{ $client->prenom}}</div>
        <div><span>ADDRESS</span> {{ $client->adresse }}</div>
        {{-- <div><span>EMAIL</span> {{ $client->email }}</div>
        <div><span>TEL</span> {{ $client->telephone }}</div> --}}

      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">NUMERO DENT</th>
            <th class="desc">ACTE</th>
            <th class="service">SOUS_ACTE</th>
            <th class="desc">PRIX</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($item_devis as $item)
            <tr>
                <td class="service">{{ $item->numero_dent}}</td>
                <td class="desc">{{ $item->acte->nom}}</td>
                <td class="service">{{ $item->code->nom}}</td>
                <td class="desc">{{ $item->code->prix}}</td>

            </tr>

          @endforeach

          <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{$devi->total}} F.CFA</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>DATE DEVI:</div>
        <div class="notice">{{$devi->created_at}}</div>
       
      </div>
    </main>
    {{-- <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer> --}}
  </body>
</html>
