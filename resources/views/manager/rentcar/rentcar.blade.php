@extends('manager.layouts.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Title</h3>

                        </div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{route('manager.rentcar')}}">
                                @csrf
                                <div class="card-body">
                                    @if($bookedcars->count())
                                    <div class="form-group">
                                        <label>Booked cars</label>
                                        <select name="bookedcar_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" data-select2-id="3">Chose car to rent</option>
                                            @foreach($bookedcars as $car)
                                                <option name="bookedcar_id" data-select2-id="3" value="{{$car->id}}">{{$car->model}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <h5>No cars booked yet...</h5>
                                        </div>
                                    @endif
                                    @if($cars->count())
                                    <div class="form-group">
                                        <label>Available cars</label>
                                        <select name="car_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" data-select2-id="3">Chose car to rent</option>
                                            @foreach($cars as $car)
                                            <option name="car_id" data-select2-id="3" value="{{$car->id}}">{{$car->model}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <h5>No cars available...</h5>
                                        </div>
                                    @endif
                                        <hr>
                                    <div class="form-group">
                                        <label for="credentials">Credentials</label><br>
                                        <input type="text" class="form-control-sm" name="client_id" placeholder="Enter credentials" id="client_id">
                                    </div>

                                    <div class="form-group">
                                        <label for="renttime">Rent time</label><br>
                                        <input type="text" class="form-control-sm" name="renttime" placeholder="Enter rent time" id="renttime">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Rent car</button>
                                    </div>

                                </div>
                                <!-- /.card-body -->


                            </form>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@endsection

