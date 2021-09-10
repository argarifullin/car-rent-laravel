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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{route('car.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="model">Model</label>
                                        <input type="text" class="form-control" name="model" placeholder="Enter model">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                                    </div>

                                    <div class="form-group">
                                        <label for="model">Year</label>
                                        <input type="text" class="form-control" name="year" placeholder="Enter year">
                                    </div>

                                    <div class="form-group">
                                        <label>Pickpoint</label>
                                        <select name="pickpoint_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" data-select2-id="3">Chose address</option>
                                            @foreach($pickpoints as $pickpoint)
                                            <option name="pickpoint_id" data-select2-id="3" value="{{$pickpoint->id}}">{{$pickpoint->address}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Upload image</label>
                                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </form>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add car</button>
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

