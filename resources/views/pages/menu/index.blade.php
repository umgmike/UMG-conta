@extends('pages.layouts.layout')

@section('Title')
	Menú
@endsection

@section('Content')
	<section class="uza-portfolio-area section-padding-80">
        <!-- Portfolio Menu -->
        <div class="portfolio-menu text-center mb-30">
            <button class="btn active" data-filter="*">Todo</button>
            <button class="btn" data-filter=".account_daily">Asientos contables</button>
            <button class="btn" data-filter=".market-analytics">Market Analytics</button>
            <button class="btn" data-filter=".List-general">Listado General</button>
        </div>

        <div class="container-fluid">
            <div class="row uza-portfolio">

                <div class="col-12 col-sm-2 col-lg-2 col-xl-2 single-portfolio-item account_daily">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/3.jpg') }}" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Asientos</h4>
                            <p></p>
                        </div>
                        <div class="view-more-btn">
                            <a href="{{ route('page.inicio') }}"><i class="arrow_right"></i></a>
                        </div>
                        <a href="#"><i class="btn btn-primary btn-block"></i></a>
                    </div>
                </div>

                <div class="col-12 col-sm-2 col-lg-2 col-xl-2 single-portfolio-item List-general">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/3.jpg') }}" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>General</h4>
                            <p></p>
                        </div>
                        <div class="view-more-btn">
                            <a href=""><i class="arrow_right"></i></a>
                        </div>
                        <a href="#"><i class="btn btn-info btn-block"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection