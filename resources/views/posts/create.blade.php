@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Add new post</h1>
    </div>
    <div class="row">
           <form action="/p" enctype="multipart/form-data" method="POST">
               @csrf
                 <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label text-md-end">Caption</label>
                            <div class="col-md-6">
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption') }}" required autocomplete="caption" name="caption" autofocus>

                                @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    </div>
                    <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                            <div class="col-md-6">
                            <input type="file" class="form-control-field" id="image" name="image">
                             @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                       <div class="row mb-3">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info">Post</button>
                            </div>
                        </div>               
           </form>
</div>
</div>
@endsection