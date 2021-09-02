@extends('admin.layouts.layout')



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Title</h3>

                            <div class="card-tools">
                                <a href="{{route('car.create')}}">
                                    <button type="button" class="btn btn-block btn-primary">Add car</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($cars->count())
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Model</th>
                                    <th>Address</th>
                                    <th style="width: 100px; text-align: center">Edit</th>
                                    <th style="width: 100px; text-align: center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($cars as $car)
                                <tr>
                                    <td style="vertical-align: middle">
                                        <h5>{{$car->id}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$car->model}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$car->pickpoint->address}}</h5>
                                    </td>
                                    <td>
                                        <a href="{{route('car.show',['id' => $car->id])}}">
                                            <button type="button" class="btn btn-block btn-info" >Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('car.delete',['id' => $car->id])}}">
                                            <button type="button" class="btn btn-block btn-danger" onclick="return confirm('Подтвердите удаление')">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <h3>No Cars added yet...</h3>
                                @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

