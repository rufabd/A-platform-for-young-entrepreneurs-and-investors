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
                        <a href="{{ route('dashboard-profile') }}" style="text-decoration: none" class="float-right">Back</a>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('create-profile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="founder_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_name" type="text"
                                        class="form-control @error('founder_name') is-invalid @enderror" name="founder_name"
                                        value="{{ old('founder_name') }}" required autocomplete="founder_name" autofocus>

                                    @error('founder_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_surname" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="founder_surname" value="{{ old('founder_surname') }}" required autocomplete="founder_surname" autofocus>

                                    @error('founder_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_position" class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_position" type="text" class="form-control @error('founder_position') is-invalid @enderror"
                                        name="founder_position" value="{{ old('founder_position') }}" required autocomplete="founder_position" autofocus>

                                    @error('founder_position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_organization" class="col-md-4 col-form-label text-md-end">{{ __('Organization') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_organization" type="text" class="form-control @error('founder_organization') is-invalid @enderror"
                                        name="founder_organization" value="{{ old('founder_organization') }}" required autocomplete="founder_organization" autofocus>

                                    @error('founder_organization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_telephone" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_telephone" type="text" class="form-control @error('founder_telephone') is-invalid @enderror"
                                        name="founder_telephone" value="{{ old('founder_telephone') }}" required autocomplete="founder_telephone" autofocus>

                                    @error('founder_telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_insta_link" class="col-md-4 col-form-label text-md-end">{{ __('Instagram profile link') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_insta_link" type="text" class="form-control @error('founder_insta_link') is-invalid @enderror"
                                        name="founder_insta_link" value="{{ old('founder_insta_link') }}" required autocomplete="founder_insta_link" autofocus>

                                    @error('founder_insta_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_face_link" class="col-md-4 col-form-label text-md-end">{{ __('Facebook profile link') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_face_link" type="text" class="form-control @error('founder_face_link') is-invalid @enderror"
                                        name="founder_face_link" value="{{ old('founder_face_link') }}" required autocomplete="founder_face_link" autofocus>

                                    @error('founder_face_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_linked_link" class="col-md-4 col-form-label text-md-end">{{ __('Linkedin profile link') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_linked_link" type="text" class="form-control @error('founder_linked_link') is-invalid @enderror"
                                        name="founder_linked_link" value="{{ old('founder_linked_link') }}" required autocomplete="founder_linked_link" autofocus>

                                    @error('founder_linked_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="founder_description" class="col-md-4 col-form-label text-md-end">{{ __('Extra Notes About You') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="founder_description" type="text" class="form-control @error('founder_description') is-invalid @enderror"
                                        name="founder_description" value="{{ old('founder_description') }}" required autocomplete="founder_description" autofocus> --}}

                                        <textarea name="founder_description" id="founder_description" cols="30" rows="10" class="form-control @error('founder_description') is-invalid @enderror" value="{{ old('founder_description') }}" required autocomplete="founder_description" autofocus></textarea>

                                    @error('founder_description')
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
                                <label for="founder_avatar" class="col-md-4 col-form-label text-md-end">{{ __('Choose your avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="founder_avatar" type="file" class="form-control-file @error('founder_avatar') is-invalid @enderror"
                                        name="founder_avatar" value="{{ old('founder_avatar') }}" required autocomplete="founder_avatar" autofocus>

                                    @error('founder_avatar')
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