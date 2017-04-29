
@extends('layouts.app')
@section('content')

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
                                        <option value="Plumber">Pumbler</option>
                                        <option value="Ac-Technician">Ac Technicain</option>
                                        <option value="Maid">Maid</option>
                                        <option value="Dilvery-boy">Dilvery Boy</option>
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
                                    <option value="200">Rs 200</option>
                                    <option value="400">Rs 400</option>
                                    <option value="600">Rs 600</option>
                                    <option value="800">Rs 800</option>
                                    <option value="1000">Rs 1000</option>
                                    <option value="1200">Rs 1200</option>
                                    <option value="1400">Rs 1400</option>
                                    <option value="1600">Rs 1600</option>
                                    <option value="1800">Rs 1800</option>
                                    <option value="2000">Rs 2000</option>
                                    <option value="2200">Rs 2200</option>
                                    <option value="2400">Rs 2400</option>
                                    <option value="2600">Rs 2600</option>
                                    <option value="2800">Rs 2800</option>
                                    <option value="3000">Rs 3000</option>
                                    <option value="3200">Rs 3200</option>
                                    <option value="3400">Rs 3400</option>
                                    <option value="3600">Rs 3600</option>
                                    <option value="3800">Rs 3800</option>
                                    <option value="4000">Rs 4000</option>
                                    <option value="4200">Rs 4200</option>
                                    <option value="4400">Rs 4400</option>
                                    <option value="4600">Rs 4600</option>
                                    <option value="4800">Rs 4800</option>
                                    <option value="5000">Rs 5000</option>
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
