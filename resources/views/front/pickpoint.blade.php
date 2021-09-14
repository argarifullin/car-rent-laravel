@extends('front.layouts.layout')


@section('content')


    <section class="pt-4">

            <div class="container pt-5" id="app">
                <div class="row mb-3">
                    <div class="col">
                        <h1>Choose your car</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li
                                class="list-group-item list-group-item-action"
                                v-for="(car, index) of cars"
                                v-on:click="selectCar(index)"
                                :class="{'active':selectedCar === index}">
                                @{{ car.model }} - @{{ car.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <h2>Car image</h2>
                                <img v-bind:src="car.image" style="height: 200px" class="rounded">
                            </div>
                            <div class="col-md-7 pt-2">
                                <h5>Car details</h5>
                                <ul>
                                    <li>Model - <strong>@{{ car.model }}</strong></li>
                                    <li>Name - <strong>@{{ car.name }}</strong></li>
                                    <li>Year - <strong>@{{ car.year }}</strong></li>
                                </ul>
                                <div class="phone">
                                    <transition name="phone">
                                        <p v-if="phoneVisible">Phone number</p>
                                    </transition>
                                </div>
                                <button class="btn btn-outline-success me-3" v-on:click="phoneVisible = !phoneVisible">@{{ phoneBtnText }}</button>
                                @auth()
                                <a :href="car.book_id"> <button class="btn btn-primary" onclick="return confirm('Are you sure you want to book this car')"onclick="return confirm('Подтвердите удаление')">Book</button></a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </section>

    @include('front.layouts.scripts')


@endsection
