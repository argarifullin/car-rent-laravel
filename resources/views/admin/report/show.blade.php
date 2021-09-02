@extends('admin.layouts.layout')



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>

                        </div>

                        <div class="card-body">
                            @if($report->count())
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Manager ID</th>
                                        <th>Car ID</th>
                                        <th>Client ID</th>
                                        <th>Date</th>
                                        <th style="width: 100px; text-align: center">Cost</th>

                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($report as $item)
                                        <tr>
                                            <td style="vertical-align: middle">
                                                <h5>{{$item->id}}</h5>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <h5>{{$item->manager_id}}</h5>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <h5>{{$item->car_id}}</h5>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <h5>{{$item->client_id}}</h5>
                                            </td>
                                            <td>
                                                <h5>{{$item->created_at}}</h5>
                                            </td>
                                            <td>
                                                <h5>{{$item->cost}}</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <h3>No Data for this {{$title}}...</h3>
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

