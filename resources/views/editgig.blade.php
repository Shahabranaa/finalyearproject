
@extends('layouts.app')
@section('content')
    @include('menunav')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Gig</div>
                    <div class="panel-body">
                        <form class="form-horizontal  " role="form"  method="POST" action="{{ url('/updategig',['gig_id'=>$gig->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Gig Title</label>


                                <div class="col-md-8 ">
                                    <textarea id="gigtitle" type="text" class="form-control"  maxlength="100" placeholder=" do something I'm really good at" name="gigtitle" utofocus="autofocus"  value="{{ (old('gigtitle')) ?:$gig->gigtitle }}" required autofocus style="resize: none">{{ (old('gigtitle')) ?:$gig->gigtitle }}</textarea>
                                    <span class="gig-before-title">I will</span>
                                    @if ($errors->has('gigtitle'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gigtitle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--{{$gig->gigtitle}}--}}
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">

                                <label for="category" class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <?php
                                        $categories = \App\Category::all();
                                     ?>


                                    <select name="category" id="category" type="" class="form-control"  value="" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category}}" @if($category->category == $category->category)selected="selected"@endif>{{$category->category}}</option>
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
                                    <textarea id="description" class="form-control" rows="8"name="description" required>{{ (old('gigtitle')) ?:$gig->description }}</textarea>
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
                                    <input id="my-awesome-dropzone" class="btn btn-default btn-file dropzone " type="file" style="" name="image" required  value="{{$gig->image }}">
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
                                        <?php
                                            $prices = \App\Price::all()
                                        ?>
                                        @foreach($prices as $price)
                                            <option value="{{$price->price}}" @if($price->price == $gig->price)selected="selected"@endif>{{$price->price}}</option>
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
                                        Update Gig
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
