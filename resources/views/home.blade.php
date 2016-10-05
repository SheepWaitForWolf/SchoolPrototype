@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="well well-sm">
                <div class="form-group">
                    <div class="input-group input-group-md">
                        <div class="icon-addon addon-md">
                            <input type="text" placeholder="What are you looking for?" class="form-control" v-model="query">
                        </div>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" @click="search()" v-if="!loading">Search!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" v-if="error">
         <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
         @{{ error }}
            </div>
            <div id="products" class="row list-group">
            </div>
            <div class="item col-xs-4 col-lg-4" v-for="product in products">
    <div class="thumbnail">
        <img class="group list-group-image" :src="product.image" alt="@{{ product.title }}" />
        <div class="caption">
            <h4 class="group inner list-group-item-heading">@{{ product.title }}</h4>
            <p class="group inner list-group-item-text">@{{ product.description }}</p>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p class="lead">$@{{ product.price }}</p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success" href="#">Add to cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
@endsection
