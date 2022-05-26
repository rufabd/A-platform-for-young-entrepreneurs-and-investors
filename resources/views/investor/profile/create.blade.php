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
                        <a href="{{ route('dashboard-profile-investor') }}" style="text-decoration: none" class="float-right">Back</a>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('create-profile-investor') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="investor_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_name" type="text"
                                        class="form-control @error('investor_name') is-invalid @enderror" name="investor_name"
                                        value="{{ old('investor_name') }}" required autocomplete="investor_name" autofocus>

                                    @error('investor_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="investor_surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_surname" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="investor_surname" value="{{ old('investor_surname') }}" required autocomplete="investor_surname" autofocus>

                                    @error('investor_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="itag_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('You are mostly interested in ...') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <select name="industry_tag_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($pindustrytags as $pindustrytag)
                                            <option value="{{ $pindustrytag->id }}">{{ $pindustrytag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('itag_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="investor_description" class="col-md-4 col-form-label text-md-end">{{ __('Describe yourself in a few sentences') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_description" type="text" class="form-control @error('investor_description') is-invalid @enderror"
                                        name="investor_description" value="{{ old('investor_description') }}" required autocomplete="investor_description" autofocus>

                                    @error('investor_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="investor_insta_link" class="col-md-4 col-form-label text-md-end">{{ __('Instagram profile link') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_insta_link" type="text" class="form-control @error('investor_insta_link') is-invalid @enderror"
                                        name="investor_insta_link" value="{{ old('investor_insta_link') }}" required autocomplete="investor_insta_link" autofocus>

                                    @error('investor_insta_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="investor_face_link" class="col-md-4 col-form-label text-md-end">{{ __('Facebook profile link') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_face_link" type="text" class="form-control @error('investor_face_link') is-invalid @enderror"
                                        name="investor_face_link" value="{{ old('investor_face_link') }}" required autocomplete="investor_face_link" autofocus>

                                    @error('investor_face_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="investor_linked_link" class="col-md-4 col-form-label text-md-end">{{ __('Linkedin profile link') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_linked_link" type="text" class="form-control @error('investor_linked_link') is-invalid @enderror"
                                        name="investor_linked_link" value="{{ old('investor_linked_link') }}" required autocomplete="investor_linked_link" autofocus>

                                    @error('investor_linked_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="input-fieldd">
                                <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Please select your avatar') }}</label>
                                <input type="file" name="image" class="form-control-file">
                            </div> --}}

                            <div class="row mb-3">
                                <label for="investor_avatar" class="col-md-4 col-form-label text-md-end">{{ __('Choose your avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="investor_avatar" type="file" class="form-control-file @error('investor_avatar') is-invalid @enderror"
                                        name="investor_avatar" value="{{ old('investor_avatar') }}" required autocomplete="investor_avatar" autofocus>

                                    @error('investor_avatar')
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