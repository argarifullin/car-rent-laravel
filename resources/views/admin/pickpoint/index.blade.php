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
                                <a href="{{route('pickpoint.create')}}">
                                    <button type="button" class="btn btn-block btn-primary">Add pickpoint</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($pickpoints->count())
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Address</th>
                                    <th style="width: 100px; text-align: center">Edit</th>
                                    <th style="width: 100px; text-align: center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($pickpoints as $pickpoint)
                                <tr>
                                    <td style="vertical-align: middle">
                                        <h5>{{$pickpoint->id}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$pickpoint->address}}</h5>
                                    </td>
                                    <td>
                                        <a href="{{route('pickpoint.show',['id' => $pickpoint->id])}}">
                                            <button type="button" class="btn btn-block btn-info" >Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('pickpoint.delete',['id' => $pickpoint->id])}}">
                                            <button type="button" class="btn btn-block btn-danger" onclick="return confirm('Подтвердите удаление')">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <h3>No Pickpoints added yet...</h3>
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

