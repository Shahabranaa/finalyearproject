
@extends('layouts.app')
@section('content')
    @include('menunav')


    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">

                        {{--form start--}}

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-profile') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{--bio of profile--}}

                            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                <label for="bio" class="col-md-4 control-label"> Your Bio</label>
                                <div class="col-md-8 ">
                                    <textarea id="bio" type="text" class="form-control" placeholder=" My name is umar I'm a professional in Wordpress site optimzation from more than 2 years working experience
 I can tweak wordpress sites, fix errors and customize themes. I am also a Social Media Marketer and offer youtube ranking, youtube views and other promotional services." rows="8" name="bio" utofocus="autofocus" value="{{ old('bio') }}" required autofocus style="resize: none"></textarea>
                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--Language Select--}}

                            <div class="container-fluid col-md-offset-4">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="panel panel-default">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading">Choosse Language </div>
                                            <?php
                                            $languages = \App\Language::orderBy('id', 'DESC')->get();
                                            ?>
                                            @foreach($languages as $language)

                                            <ul class="list-group checkbox-group">
                                                <li class="list-group-item">
                                                  {{  ucfirst($language->language)}}
                                                    <div class=" pull-right">
                                                        <input id=" {{$language->language}}" name="Language[]" value="{{$language->language}}" required type="checkbox"  />
                                                        <label for=" {{$language->language}}" class="label-primary"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>

                                {{-- Skillls--}}

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="panel panel-default">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading">Choose Skill </div>
                                            <?php
                                            $skills = \App\Skill::orderBy('id', 'DESC')->get();;
                                            ?>
                                            @foreach($skills as $skill)
                                            <ul class="list-group" >
                                                <li class="list-group-item">
                                                    {{ucfirst($skill->skill)}}
                                                    <div class=" pull-right">
                                                        <input id=" {{$skill->skill}}" name="Skill[]" value="{{$skill->skill}}" required type="checkbox"  />
                                                        <label for=" {{$skill->skill}}" class="label-primary"></label>
                                                    </div>
                                                </li>
                                              </ul>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Mobile No select--}}

                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-md-4 control-label">Mobile #</label>
                                <div class="col-md-4">
                                    <input id="mobile" class="form-control" required  name="mobile" >
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--profile image select--}}

                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}" >
                                <label for="profileImage" class="col-md-4 control-label">Profile Picture</label>
                                <div class="col-md-4">
                                    <input id="profileImage" class="btn btn-default btn-file " required type="file" style="" name="profileImage"  >
                                    @if ($errors->has('profileImage'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profileImage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--Cnic Image select--}}

                            <div class="form-group {{ $errors->has('cnic') ? ' has-error' : '' }}" >
                                <label for="cnic" class="col-md-4 control-label">CNIC Picture</label>
                                <div class="col-md-4">
                                    <input id="cnic" class="btn btn-default btn-file " type="file" required name="cnic"  >
                                    @if ($errors->has('cnic'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cnic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--City Selecyt--}}

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">Address</label>
                                <div class="col-md-2">
                                    <select name="city" id="price" type="" class="form-control"  value="{{ old('city') }}" >
                                        <option value="">Select City</option>
                                        <option value="lahore">Lahore</option>
                                        <option value="faislabad">Faislabad</option>
                                        <option value="multan">Multan</option>
                                        <option value="karachi">karachi</option>
                                        <option value="islamabad">Islamabad</option>
                                    </select>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            {{--Area Select--}}

                                <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                                    <div class="col-md-2">
                                        <select name="area" id="price" type="" class="form-control"  value="{{ old('area') }}" >
                                            <option value="">Select Area</option>
                                            <option value="Johar Town">Johar town</option>
                                            <option value="Modal Town">Model town</option>
                                            <option value="Faisal Town">Faisal town</option>
                                            <option value="Ichara">Ichara</option>
                                            <option value="DHA">Dha</option>
                                            <option value="Gullberg">Gulberg</option>
                                            <option value="EME">EME</option>
                                        </select>
                                        @if ($errors->has('area'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>




                            {{--Sumbit button--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" value="Submit"  >
                                        Create Gig
                                    </button>
                                </div>
                            </div>
                        </form>  {{--end of form --}}
                    </div>    {{-- end of panel body --}}
                </div>      {{-- end of panel --}}
            </div>      {{--End of col-md-12  --}}
        </div>      {{-- End of Row --}}
    </div>        {{-- End of container --}}

@endsection
