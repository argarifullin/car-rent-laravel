@extends('front.layouts.layout')

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

    <section class="pt-4">
        <div class="container-md">
            <!-- Page Features-->

            <div class="row justify-content-center">
                <div class="col-8">
                @auth()
                @if($cars->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Model</th>

                        <th >Book this car</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td>{{$car->id}}</td>
                        <td>{{$car->model}}</td>
                        @auth()
                        <td><a href="{{route('car.book', ['id' => $car->id])}}"><button type="button" class="btn btn-success">Rent this car</button></a></td>
                        @endauth
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                @else
                    <h5>No cars available at this pickpoint</h5>
                @endif
                @endauth
                @guest()
                    <h5>Please register or login before see available cars...</h5>
                @endguest
                </div>
            </div>
        </div>
    </section>
@endsection
