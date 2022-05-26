@extends('layouts.app')

@section('content')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-center mb-4" style="margin-top: 100px">
        <h1 class="h3 mb-0 text-gray-800">Create Your Profile</h1>
    </div>

    <div class="container" style="margin-top: 30px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard-profile-skilled') }}" style="text-decoration: none" class="float-right">Back</a>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('create-profile-skilled') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="skilled_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_name" type="text"
                                        class="form-control @error('skilled_name') is-invalid @enderror" name="skilled_name"
                                        value="{{ old('skilled_name') }}" required autocomplete="skilled_name" autofocus>

                                    @error('skilled_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_surname" type="text"
                                        class="form-control @error('skilled_surname') is-invalid @enderror" name="skilled_surname"
                                        value="{{ old('skilled_surname') }}" required autocomplete="skilled_surname" autofocus>

                                    @error('skilled_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_profession"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Profession') }}</label>

                                <div class="col-md-6">
                                    <select name="skilled_profession" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($hiringtagg as $hiringtag)
                                            <option value="{{ $hiringtag->name }}">{{ $hiringtag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('skilled_profession')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_industry"
                                    class="col-md-4 col-form-label text-md-end">{{ __('You are looking for startup in industry..') }}</label>

                                <div class="col-md-6">
                                    <select name="skilled_industry" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($industrytagg as $industrytag)
                                            <option value="{{ $industrytag->name }}">{{ $industrytag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('skilled_industry')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_telephone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Telephone number') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_telephone" type="text"
                                        class="form-control @error('skilled_telephone') is-invalid @enderror" name="skilled_telephone"
                                        value="{{ old('skilled_telephone') }}" required autocomplete="skilled_telephone" autofocus>

                                    @error('skilled_telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_description" class="col-md-4 col-form-label text-md-end">{{ __('Describe yourself in a few sentences') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_description" type="text" class="form-control @error('skilled_description') is-invalid @enderror"
                                        name="skilled_description" value="{{ old('skilled_description') }}" required autocomplete="skilled_description" autofocus>

                                    @error('skilled_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_experience_organization" class="col-md-4 col-form-label text-md-end">{{ __('Last Experience Organization') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_experience_organization" type="text" class="form-control @error('skilled_experience_organization') is-invalid @enderror"
                                        name="skilled_experience_organization" value="{{ old('skilled_experience_organization') }}" required autocomplete="skilled_experience_organization" autofocus>

                                    @error('skilled_experience_organization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_experience_position" class="col-md-4 col-form-label text-md-end">{{ __('What was your position?') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_experience_position" type="text" class="form-control @error('skilled_experience_position') is-invalid @enderror"
                                        name="skilled_experience_position" value="{{ old('skilled_experience_position') }}" required autocomplete="skilled_experience_position" autofocus>

                                    @error('skilled_experience_position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="skilled_experience_from" class="col-md-4 col-form-label text-md-end">{{ __('From') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_experience_from" type="date" class="form-control @error('skilled_experience_from') is-invalid @enderror"
                                        name="skilled_experience_from" value="{{ old('skilled_experience_from') }}" required autocomplete="skilled_experience_from" autofocus>

                                    @error('skilled_experience_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_experience_till" class="col-md-4 col-form-label text-md-end">{{ __('Till') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_experience_till" type="date" class="form-control @error('skilled_experience_till') is-invalid @enderror"
                                        name="skilled_experience_till" value="{{ old('skilled_experience_till') }}" required autocomplete="skilled_experience_till" autofocus>

                                    @error('skilled_experience_till')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_experience_description" class="col-md-4 col-form-label text-md-end">{{ __('Describe your last Experience') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="skilled_experience_description" type="text" class="form-control @error('skilled_experience_description') is-invalid @enderror"
                                        name="skilled_experience_description" value="{{ old('skilled_experience_description') }}" required autocomplete="skilled_experience_description" autofocus> --}}

                                        <textarea id="skilled_experience_description" class="form-control @error('skilled_experience_description') is-invalid @enderror" name="skilled_experience_description" value="{{ old('skilled_experience_description') }}" required autocomplete="skilled_experience_description" autofocus cols="30" rows="10"></textarea>

                                    @error('skilled_experience_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label for="skilled_CV" class="col-md-4 col-form-label text-md-end">{{ __('Upload Your CV') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_CV" type="file" class="form-control @error('skilled_CV') is-invalid @enderror"
                                        name="skilled_CV" value="{{ old('skilled_CV') }}" required autocomplete="skilled_CV" autofocus>

                                    @error('skilled_CV')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skilled_avatar" class="col-md-4 col-form-label text-md-end">{{ __('Choose your avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="skilled_avatar" type="file" class="form-control-file @error('skilled_avatar') is-invalid @enderror"
                                        name="skilled_avatar" value="{{ old('skilled_avatar') }}" required autocomplete="skilled_avatar" autofocus>

                                    @error('skilled_avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Profile') }}
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