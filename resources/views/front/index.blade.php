@extends('front.layouts.layout')



        <!-- Header-->
@section('content')
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">We are service for car rent</h1>
                        <p class="fs-4">We have been working since ....</p>
                        <a class="btn btn-primary btn-lg" href="">About us (empty)</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->


        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    @foreach($pickpoints as $pickpoint)
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="fas fa-car"></i></div>
                                <h2 class="fs-4 fw-bold">{{$pickpoint->address}}</h2>
                                <p class="mb-0">Get your car here!!!</p>
                            </div>
                            <a class="btn btn-primary btn-group-sm" href="{{route('pickpoint.show',['id' => $pickpoint->id])}}">Rent your car here</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection



