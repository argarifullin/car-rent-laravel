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


                        </div>

                        <div class="card-body">
                            @if($clients->count())
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 200px; text-align: center">Add to manager</th>
                                    <th style="width: 100px; text-align: center">Edit</th>
                                    <th style="width: 100px; text-align: center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($clients as $client)
                                <tr>
                                    <td style="vertical-align: middle">
                                        <h5>{{$client->id}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$client->name}}</h5>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h5>{{$client->email}}</h5>
                                    </td>
                                    <td >
                                            <a href="{{route('show.newmanager',['id' => $client->id])}}">
                                                <button type="button" class="btn btn-block btn-info " >Add to manager</button>
                                            </a>
                                    </td>
                                    <td>
                                        <a href="{{route('user.show.client',['id' => $client->id])}}">
                                            <button type="button" class="btn btn-block btn-info" >Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('user.delete.client',['id' => $client->id])}}">
                                            <button type="button" class="btn btn-block btn-danger" onclick="return confirm('Подтвердите удаление')">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <h3>You have no clients yet...</h3>
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

