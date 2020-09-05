<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LIBRO DIARIO | SYS-JOHHAN</title>
    <style>

      caption 
    {     
      font-size: 15px;     
      font-weight: normal;     
      padding: 0px;    
      background: #060302;
      border-top: 4px 
      solid #060302;   
      border-bottom: 1px 
      solid #060302; 
      color: #060302; 
      text-align: center;
    }

    table {
      border-collapse: collapse;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      background-color: transparent;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
      padding: 0.5rem;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .table-sm th,
    .table-sm td {
      padding: 0.3rem;
    }

    .table-bordered {
      border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
      border-bottom-width: 2px;
    }

    .table-borderless th,
    .table-borderless td,
    .table-borderless thead th,
    .table-borderless tbody + tbody {
      border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
      color: #212529;
      background-color: rgba(0, 0, 0, 0.075);
    }

    th {
      text-align: inherit;
    }

    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }

    .table-responsive > .table-bordered {
      border: 0;
    }
    </style>
</head>

<body>
  <div>
    <caption>SYSTEM ACCOUNTING | SYS-JOHHAN"</caption>
    <caption>LIBRO DIARIO</caption>
    <caption>(Cifras en quetzales.)</caption>
    <caption>Hora y fecha : {{ date('Y-m-d H:m:s') }}</caption><br><br>
    
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Fecha partida</th>
            <th scope="col">N° partida</th>
            <th scope="col">Cod naturaleza</th>
            <th style="text-align: left;">Naturaleza</th>
            <th style="text-align: left;">Cuenta</th>
            <th style="text-align: right;">Q. Debe</th>
            <th style="text-align: right;">Q. Haber</th>
          </tr>
        </thead>

        <tbody>
          @foreach($partida as $item)
            <tr>
              <td style="text-align: center;">  {{   $item->fecha_asiento            }}</td>
              <td style="text-align: center;">  {{   $item->id_asiento               }}</td>
              <td style="text-align: center;">  {{   $item->codigo                   }}</td>
              <td style="text-align: left;">    {{   $item->nombre                   }}</td>
              <td style="text-align: left;">    {{   $item->nombreCuenta             }}</td>   
              <td style="text-align: right;">   {{   number_format($item->debe)      }}</td>    
              <td style="text-align: right;">   {{   number_format($item->haber)     }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr>
            	<td style="text-align: center;"></td>
            	<td style="text-align: center;"></td>
            	<td style="text-align: center;"></td>
            	<td style="text-align: center;"></td>
            	<td style="text-align: right;">Totales:</td>
            	<td style="text-align: right;">   {{   number_format($totalDebe)      }}</td> 
            	<td style="text-align: center;"></td>
            </tr>
        </tfoot>
  
    </table>
  </div>
</body>
</html>