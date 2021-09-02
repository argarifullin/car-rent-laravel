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
                            <form method="post" action="{{route('addmanager')}}">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" value="{{$tomanager->id}}" name="id">

                                    <div class="form-group">
                                        <label for="model">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$tomanager->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Pickpoint address</label>
                                        <select name="pickpoint_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" data-select2-id="3">Chose pickpoint</option>
                                            @foreach($pickpoints as $pickpoint)
                                                <option name="pickpoint_id" data-select2-id="3" value="{{$pickpoint->id}}">{{$pickpoint->address}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update info</button>
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

