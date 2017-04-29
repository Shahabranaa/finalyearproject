
@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">

                        {{--form start--}}

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">
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
                                            <ul class="list-group checkbox-group">
                                                <li class="list-group-item">
                                                    English
                                                    <div class=" pull-right">
                                                        <input id="languageEnglish" name="language[]" type="checkbox" value="{{ old('languageEnglish') }}" required="required" />
                                                        <label for="languageEnglish" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Urdu
                                                    <div class="maXterial-switch pull-right">
                                                        <input id="languagesUrdu" name="language[]" type="checkbox" value="urdu"required="required"/>
                                                        <label for="languagesUrdu" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Punjabi
                                                    <div class="maXterial-switch pull-right">
                                                        <input id="languagePunjabi" name="language[]" type="checkbox" value="punjabi"required="required"/>
                                                        <label for="languagePunjabi" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Pashtoon
                                                    <div class="maXterial-switch pull-right">
                                                        <input id="languagePashtoon" name="language[]" type="checkbox" value="{{ old('languagePashtoon') }}"required="required"/>
                                                        <label for="languagePashtoon" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Sindi
                                                    <div class="maXterial-switch pull-right">
                                                        <input id="languageSindi" name="language[]" type="checkbox" value="{{ old('languageSindi') }}"required="required"/>
                                                        <label for="languageSindi" class="label-primary"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                {{-- Skillls--}}

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="panel panel-default">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading">Choose Skill </div>
                                            <ul class="list-group" >
                                                <li class="list-group-item">
                                                    Plumber
                                                    <div class=" pull-right">
                                                        <input id="plumber" name="Skill[]" value="{{ old('plumber') }}"  type="checkbox" required="required" />
                                                        <label for="plumber" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Technican
                                                    <div class=" pull-right">
                                                        <input id="technican" name="Skill[]" value="{{ old('technican') }}" type="checkbox" required="required"/>
                                                        <label for="technican" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Ac-Technican
                                                    <div class="pull-right">
                                                        <input id="acTechnican" name="Skill[]" value="acTech" type="checkbox"required="required"/>
                                                        <label for="acTechnican" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Maid
                                                    <div class=" pull-right">
                                                        <input id="maid" name="Skill[]" value="maid" type="checkbox"required="required"/>
                                                        <label for="maid" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Painter
                                                    <div class=" pull-right">
                                                        <input id="painter" name="Skill[]" value="{{ old('painter') }}" type="checkbox"required="required"/>
                                                        <label for="painter" class="label-primary"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Mobile No select--}}

                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-md-4 control-label">Mobile #</label>
                                <div class="col-md-4">
                                    <input id="mobile" class="form-control" name="mobile" required>
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
                                    <input id="profileImage" class="btn btn-default btn-file " type="file" style="" name="profileImage" required >
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
                                    <input id="cnic" class="btn btn-default btn-file " type="file" style="" name="cnic" required >
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
                                    <select name="city" id="price" type="" class="form-control"  value="{{ old('city') }}" required>
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
                                        <select name="area" id="price" type="" class="form-control"  value="{{ old('area') }}" required>
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
