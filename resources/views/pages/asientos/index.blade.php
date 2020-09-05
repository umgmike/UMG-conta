@extends('pages.layouts.layout')

@section('Title')
	Asientos contables
@endsection


@section('Content')
<div class="col-12 col-sm-12 col-lg-11 col-xl-11">
  @section('nombre_ruta', 'Catálogo de asientos contables')
  @section('dashboard_nombre', 'Inicio')
  @section('dashboard_ruta', route('menu_principal.home'))
  @include('pages.layouts.navbar')


  <div class="portfolio-menu text-center mb-30">
    <div class="col-lg-4">
      <a href="{{ route('page.create.accounting') }}" class="btn btn-primary btn-block tooltipsC" title="Crear nuevo asiento contable">
        <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo asiento contable
      </a>
    </div><br>

    <div class="col-lg-4">
      <a href="{{ route('page.pdf-asiento') }}" class="btn btn-primary btn-block tooltipsC" title="Ver reporte de libro diario">
        <i class="fa fa-fw fa-plus-circle"></i> Ver reporte libro diario
      </a>
    </div>
  </div>
</div>

<div class="col-12 col-sm-12 col-lg-12 col-xl-12 single-portfolio-item Classification">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
        <div class="text-center">
              <small style="font-size:30px;  color:black">
                <strong>CATÁLOGO DE ASIENTOS CONTABLES.</strong>
              </small>
        </div>
        <div class="dropdown notifications-menu text-center"><b>Cantidad de registros :</b>
            <a data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center">@if (count($asientos_c) == 1) {{count($asientos_c)}} registro </li>
              <li class="header text-center">@elseif (count($asientos_c) == '') {{count($asientos_c)}} ningun registro</li>
              <li class="header text-center">@elseif (count($asientos_c) != '') {{count($asientos_c)}} registros</li> @endif
            </ul>
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">Accounting daily</div>
        </div>

        <table class="table" id="TableStyle">
          <thead>
            <tr>
              <th scope="col" class="txt-center">Fecha partida</th>
              <th scope="col" class="txt-center">No. partida</th>
              <th scope="col" class="txt-center">Debe Q.</th>
              <th scope="col" class="txt-center">Haber Q.</th>
              <th scope="col" class="txt-center">Descripción</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($asientos_c as $item)
              <tr>
                <td>  {{ $item->fecha_asiento }}</td>
                <td>  {{ $item->numero_partida }} </td>
                <td>  {{ $item->total_debe }}</td>
                <td>  {{ $item->total_haber }}</td>
                <td>  {{ $item->descripcion }}</td>
                <td>  {{ $item->created_at }}   </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th scope="col" class="txt-center">Fecha partida</th>
              <th scope="col" class="txt-center">No. partida</th>
              <th scope="col" class="txt-center">Debe Q.</th>
              <th scope="col" class="txt-center">Haber Q.</th>
              <th scope="col" class="txt-center">Descripción</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <a href="" class="btn btn-primary btn-block "></a>
    </div>
  </div>
</div>
@endsection