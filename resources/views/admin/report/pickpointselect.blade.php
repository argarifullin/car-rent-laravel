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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>{{$title}}</label>
                                        <select name="{{$title}}_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" data-select2-id="3">Chose {{$title}}</option>
                                                @foreach($items as $item)
                                                <option name="{{$title}}_id" data-select2-id="3" value="{{$item->id}}">{{$item->address}}</option>
                                                @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create report</button>
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

