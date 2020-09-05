@extends('pages.layouts.layout')

@section('Title')
    Crear
@endsection


<style>
    .sinborde {
        border: 0;
    }    
</style>

@section('Content')
<div class="col-12 col-sm-12 col-lg-11 col-xl-11">
  @section('nombre_ruta', 'Crear asientos contables')
  @section('dashboard_nombre', 'Listado de asientos')
  @section('dashboard_ruta', route('page.inicio'))
  @include('pages.layouts.navbar')
</div>

<div class="col-12 col-sm-12 col-lg-12 col-xl-12 single-portfolio-item Classification">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
        <div class="text-center">
              <small style="font-size:30px;  color:black">
                <strong>*** CREAR ASIENTOS CONTABLES ***</strong>
              </small>
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">Create daily</div>
        </div>

        {!!Form::open()!!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          @include("pages.asientos.form")

          @include("pages.asientos.detalle")

          <div class="row offset-3">
            <div class="col-lg-7">
              <label for="descripcion" class="control-label"><strong>Descripción : </strong></label>
              <textarea type="text" id="descripcion" rows="6" name="descripcion" class="form-control" placeholder="Escriba descripcion del asiento contable" title="Escriba descripcion del asiento contable"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="row offset-3">
              <div class="col-lg-8">
                {!!link_to('#', $title='Guardar informacion', $attributes = ['id'=>'registro', 'class'=>'btn uza-btn mt-40 btn-1'], $secure = null)!!}   
              </div>
            </div>
          </div>

      

        {!!Form::close()!!}
<!-- jQuery js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" integrity="sha512-ju6u+4bPX50JQmgU97YOGAXmRMrD9as4LE05PdC3qycsGQmjGlfm041azyB1VfCXpkpt1i9gqXCT6XuxhBJtKg==" crossorigin="anonymous"></script>
      
        {!!Html::script('js/script.js')!!}
      </div>


      <a href="" class="btn btn-info btn-block "></a>
    </div>
  </div>
</div>

@endsection

@section('footer_scripts')
    <script type="text/javascript">
        var i = 1;


        $('#btn_agregar').click(function(){
            var fecha = document.getElementById("fecha_asiento").value;
            var partida = document.getElementById("numero_partida").value;
            var id_cuenta = document.getElementById("id_cuenta").value;
            var combo = document.getElementById("nombreCuenta");
            var selected = combo.options[combo.selectedIndex].text;

            var debe = document.getElementById('debe').value;
            var haber = document.getElementById('haber').value;
            var descripcion = document.getElementById('descripcion').value;

            
            var monto = parseFloat(debe);
            var monto2 = parseFloat(haber);

        if(debe.trim()!=''){
            var fila = '<tr class="fila" id="row' + i + '">' + 

                        '<td name="ctv" id="cuenta">' + selected + '</td>' +
                        '<td class="monto" id="monto" >' + monto.toFixed(2) + '</td>' +
                        '<td class="monto" id="monto" >' + monto2.toFixed(2) + '</td>' +
                        '<td><button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger btn_remove"><i class="fa fa-trash"></button>' +
                          '<td class="id" id="id_cuenta" style="visibility:hidden;" >' + combo['value'] + '</td>' + '</td></tr>';
            i++;
            $('#cuerpo').append(fila);
            
        } else {
                alert('Por favor rellene la informacion para guardar su informacion');
            }

            document.getElementById("debe").value = "0";
            document.getElementById("haber").value = "0";

        });


//nombreCuenta
        $('#btn_agregar').click(function () {
            var total = 0;
            $('.monto').each(function () {
                total +=parseFloat($(this).html());
            })
            $('.toalApa').html(total.toFixed(2));
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();

        });

        $(document).on('click','.btn_remove',function () {
            var totalrenew = $('.toalApa').html();
            var monto = $('.monto').html();
            var newtotal = parseFloat(totalrenew) - parseFloat(monto);

            var total=0;
            $('.monto').each(function () {
                total += parseFloat($(this).html());
            });
            $('.toalApa').html(total.toFixed(2));

            console.log('totalrenew:'+totalrenew);
            console.log('monto:'+monto);
            console.log('newtotal:'+newtotal);
        });

    </script>
@endsection
