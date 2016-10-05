@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="well well-sm">
                <div class="form-group">
                    <div class="input-group input-group-md">
                        <div class="icon-addon addon-md">
                            <input type="text" placeholder="What are you looking for?" class="form-control">
                        </div>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Search!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div id="products" class="row list-group">
            </div>
        </div>
@endsection
