@extends('layouts.converter')

@section('convcontent')
    <h3>Number to Words Converter</h3>
    <div>

        <form action="/" method="POST">
            @csrf
            <div class="row mt-3 mb-2">
                <div class="col-12 col-md-2 fw-bold text-end">Number: </div>
                <div class="col-12 col-md-8">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            @if(isset($number))
                                <input type="text" class="form-control field" name="number" value="{{ $number }}" required/>
                            @else
                                <input type="text" class="form-control field" name="number" value="{{ old('number') }}" required/>
                            @endif
                        </div>
                    </div>
                    @if ($errors->has('number'))
                        <span class="text-danger">{{ $errors->first('number') }}</span>
                    @endif
                </div>
            </div>

            <div class="row mt-3 mb-2">
                <div class="col-12 col-md-2 fw-bold text-end">Words: </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <textarea class="form-control field" rows="5" cols="5">@isset($number){{ $words }}@endisset</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-2">
                <div class="col-12 col-md-11">
                    <div class="row">
                        <div class="col-12 col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm text-light me-1">Let Convert!</button>
                            <div class="btn btn-success btn-sm text-light me-1" onclick="clearFields()">Clear fields</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-1">
                <div class="col-12">
                    <div class="fst-italic text-center text-success">
                        <b>Note:</b> as number insert 1-30 digits + optionally 2 decimals separated by '.'
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
