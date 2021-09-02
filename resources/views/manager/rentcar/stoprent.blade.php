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
                            @if($ocupiedcars->count())
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Model</th>
                                    <th>Client name</th>
                                    <th style="width: 150px; text-align: center">Stop rent</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($ocupiedcars as $car)
                                <tr>
                                    <td style="vertical-align: middle">
                                        <h5>{{$car->id}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$car->model}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$car->user->name}}</h5>
                                    </td>
                                    <td>
                                        <a href="{{route('manager.stoprent',['id' => $car->id])}}">
                                            <button type="button" class="btn btn-block btn-danger" onclick="return confirm('Confirm to stop rent')">Stop rent</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <h3>No Cars ocupied...</h3>
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

