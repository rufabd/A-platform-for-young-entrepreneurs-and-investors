@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div style="margin-top: 80px; text-align: center; align-items:center; justify-content:center;">
        <h1 class="h3 mb-0 text-gray-800" style="text-align: center; align-items:center; justify-content:center;">Project Post</h1>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Project Post') }}
                        <a href="{{ route('founder-project-posts-index') }}" style="margin-left: 100px;" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('founder-project-posts-store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="founder_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

                                <div class="col-md-6">
                                    @foreach ($fprofiles as $fprofile)
                                        @if ($fprofile->user_id == Auth::user()->id)
                                            <input value="{{ $fprofile->id }}" id="founder_id" type="hidden" class="form-control @error('founder_id') is-invalid @enderror"
                                            name="founder_id" value="{{ old('founder_id') }}" required autocomplete="founder_id" autofocus>
                                        @endif
                                    @endforeach

                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="tag_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('You are looking for') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <select name="hiring_tag_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($phiringtags as $phiringtag)
                                            <option value="{{ $phiringtag->id }}">{{ $phiringtag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="itag_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Your project industry') }}<span style="color: red;">*</span></label>

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

                            <div class="form-group row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="organization_description" class="col-md-4 col-form-label text-md-right">{{ __('Organization Description') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    {{-- <input id="organization_description" type="text" class="form-control @error('organization_description') is-invalid @enderror"
                                        name="organization_description" value="{{ old('organization_description') }}" required autocomplete="organization_description" autofocus> --}}

                                        <textarea name="organization_description" id="organization_description" cols="30" rows="4" class="form-control @error('organization_description') is-invalid @enderror" value="{{ old('organization_description') }}" required autocomplete="organization_description" autofocus></textarea>

                                    @error('organization_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="post_description" class="col-md-4 col-form-label text-md-right">{{ __('Post Description') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    {{-- <input id="post_description" type="text" class="form-control @error('post_description') is-invalid @enderror"
                                        name="post_description" value="{{ old('post_description') }}" required autocomplete="post_description" autofocus> --}}

                                        <textarea name="post_description" id="post_description" cols="30" rows="4" class="form-control @error('post_description') is-invalid @enderror" value="{{ old('post_description') }}" required autocomplete="post_description" autofocus></textarea>

                                    @error('post_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="post_description" type="text" class="form-control @error('country') is-invalid @enderror"
                                        name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="organization" class="col-md-4 col-form-label text-md-right">{{ __('Organization Name') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror"
                                        name="organization" value="{{ old('organization') }}" required autocomplete="organization" autofocus>

                                    @error('organization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="organization_year" class="col-md-4 col-form-label text-md-right">{{ __('Organization established') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="organization_year" type="date" class="form-control @error('organization_year') is-invalid @enderror"
                                        name="organization_year" value="{{ old('organization_year') }}" required autocomplete="organization_year" autofocus>

                                    @error('organization_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="project_stage" class="col-md-4 col-form-label text-md-right">{{ __('What is the stage of your project?') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="project_stage" type="text" class="form-control @error('project_stage') is-invalid @enderror"
                                        name="project_stage" value="{{ old('project_stage') }}" required autocomplete="project_stage" autofocus>

                                    @error('project_stage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="hours_per_week" class="col-md-4 col-form-label text-md-right">{{ __('At least how many hours?') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="hours_per_week" type="number" class="form-control @error('hours_per_week') is-invalid @enderror"
                                        name="hours_per_week" value="{{ old('hours_per_week') }}" required autocomplete="hours_per_week" autofocus>

                                    @error('hours_per_week')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="type_week" class="col-md-4 col-form-label text-md-right">{{ __('Type of job') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="type_week" type="text" class="form-control @error('type_week') is-invalid @enderror"
                                        name="type_week" value="{{ old('type_week') }}" required autocomplete="type_week" autofocus>

                                    @error('type_week')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="investment" class="col-md-4 col-form-label text-md-right">{{ __('How much investment your project got till today?') }}<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="investment" type="number" class="form-control @error('investment') is-invalid @enderror"
                                        name="investment" value="{{ old('investment') }}" required autocomplete="investment" autofocus>

                                    @error('investment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Store') }}
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