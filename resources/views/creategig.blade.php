
@extends('layouts.app')
@section('content')
    @include('menunav')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Gig</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-gig') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Gig Title</label>


                                <div class="col-md-8 ">
                                    <textarea id="gigtitle" type="text" class="form-control"  maxlength="100" placeholder=" do something I'm really good at" name="gigtitle" utofocus="autofocus" value="{{ old('name') }}" required autofocus style="resize: none"></textarea>
                                    <span class="gig-before-title">I will</span>
                                @if ($errors->has('gigtitle'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gigtitle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">

                                <label for="category" class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select name="category" id="category" type="" class="form-control"  value="{{ old('category') }}" required>
                                        <option value="">Select a Category</option>
                                        <?php
                                        $cate = \App\Category::all();
                                        ?>
                                        @foreach($cate as $cates)
                                            <option value="{{$cates->category}}">{{$cates->category}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-8">
                                    <textarea id="description" class="form-control" rows="8"name="description" required></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}" >
                                <label for="image" class="col-md-4 control-label">Image</label>

                                <div class="col-md-4">
                                    <input id="image" class="btn btn-default btn-file " type="file" style="" name="image" required >

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Price</label>

                            <div class="col-md-8">

                                <select name="price" id="price" type="" class="form-control"  value="{{ old('price') }}" required>
                                    <option value="">Select Price</option>
                                    <?php
                                    $prices = \App\Price::all()
                                    ?>
                                    @foreach($prices as $price)
                                        <option value="{{$price->price}}">{{$price->price}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Gig
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
