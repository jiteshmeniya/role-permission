@extends('layouts.app')
@push('style-after')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
        .select2-selection__arrow {
            height: 38px !important;
        }
        .select2-dropdown {
        z-index: 9001;
        }
    </style>

@endpush
@push('script')

@endpush

@section('content')
    <div class="container-fluid py-4">

        <form id="form1" class="g-3" action="{{ route('rates.store') }}" method="POST">
                    @csrf
                <div class="card-header mb-3 shadow">
                <div class="card shadow">
                    <div class="card-header bg-gradient-dark text-white py-2 fw-bold">Data Perjalanan</div>
                    <div class="card-body px-1">
                        <div class="d-flex">
                            <div class="ms-2 w-100">
                                <label for="departure" class="col-form-label">Relasi</label>
                                <label for="colFormLabel" class="col-auto col-form-label">Relasi</label>
                                <div class="col-sm-1">
                                    <input form="form1" type="text" class="form-control" id="distance"  name="distance" value="{{$rate->jarak }}">
                                </div>
                                <div class="input-group d-inline-flex">
                                <select type="text" class=" d-inline select2 form-select" @error('asal') is-invalid @enderror" name="asal" id="asal" required style="width: 300px">
                                        <option selected disabled>Asal</option>
                                    @foreach ($stations as $station )
                                        <option {{ $station->station_name == old('asal') ? 'selected' : '' }} {{ request()->get("asal") == $station->station_name  ? "selected" : "" }} value="{{ $station->station_name }}" >{{ $station->station_name }}</option>
                                    @endforeach
                                </select>
                                <select type="text"  class="d-inline select2 form-select" id="tujuan" aria-describedby="tujuanFeedback" name="tujuan" required style="width: 300px">
                                        <option selected disabled>Tujuan</option>
                                    @foreach ($stations as $station )
                                        <option {{ $station->station_name == old('tujuan') ? 'selected' : '' }} {{ request()->get("tujuan") == $station->station_name  ? "selected" : "" }} value="{{ $station->station_name }}" >{{ $station->station_name }}</option>
                                    @endforeach
                                </select>
                            <label for="colFormLabel" class="col-auto col-form-label">Jarak</label>
                            <div class="col-sm-1">
                                <input form="form1" type="text" class="form-control" id="distance"  name="distance" value="{{$rate->jarak }}">
                            </div>
                            <label for="colFormLabel" class="col-auto col-form-label">Tarif Dasar</label>
                            <div class="col-sm-2 ms-2">
                                <input form="form1" type="text" class="form-control" id="rate"  name="rate" value="@currency($rate->tarif)">
                            </div>
                                {{-- <button type="submit" name="submit" value="1" class="btn btn-primary btn-submit">Cek Tarif</button> --}}
                                <button name="submit" type="submit" formmethod="get" id="form1" value="1" class="btn bg-gradient-dark btn-submit d-inline">Cek Tarif</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

@endsection
