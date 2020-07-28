@extends('layouts.app')
@section('content')
<main class="py-4 bg-white border-top">
    <div class="container my-5">
        <div class="row justify-content-center">
            <h1>{{ __('Detal obce') }}</h1>
        </div>
        <div class="card-group shadow rounded">
            <div class="card bg-light  border-0">
                <div class="card-body row">
                        <div class="row w-100">
                            <div class="col-md col-sm-12 font-weight-bold">Meno starostu:</div>
                            <div class="col-md col-sm-12">{{$data->mayor ?? "-"}}</div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md col-sm-12 font-weight-bold">Adresa obecného úradu:</div>
                            <div class="col-md col-sm-12">{{$data->address_streetName ?? "-"}} {{$data->address_buildingNumber ?? "-"}}, {{$data->address_postcode ?? "-"}} {{$data->address_city ?? "-"}}</div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md col-sm-12 font-weight-bold">Telefón:</div>
                            <div class="col-md col-sm-12">
                                @if($data->phone_prefix && $data->phone)
                                    {{$data->phone_prefix ?? "-"}} / {{$data->phone ?? "-"}}
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md col-sm-12-md col-sm-12 font-weight-bold">Fax:</div>
                            <div class="col-md col-sm-12-md col-sm-12">
                                @if($data->phone_prefix && $data->fax)
                                    {{$data->phone_prefix ?? "-"}} / {{$data->fax ?? "-"}}
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md col-sm-12 font-weight-bold">Email:</div>
                            <div class="col-md col-sm-12">
                                {{$data->email ?? "-"}}
                                {{-- @if(isset($data->email))
                                <a class="text-dark" href="mailto:{{$data->email}}">{{$data->email}}</a>
                                @else
                                -
                                @endif --}}
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md col-sm-12 font-weight-bold">Web:</div>
                            <div class="col-md col-sm-12">
                                {{$data->web ?? "-"}}
                                {{-- @if(isset($data->web))
                                <a class="text-dark" href="{{$data->web}}">{{$data->web}}</a>
                                @else
                                -
                                @endif --}}
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md col-sm-12 font-weight-bold">Zemepisné súradnice:</div>
                            <div class="col-md col-sm-12">{{(isset($data->geo_latitude) && isset($data->geo_longitude)) ? ($data->geo_latitude . ", " . $data->geo_longitude) : "-"}}</div>
                        </div>
                    </div>
            </div>
            <div class="card border-0">
                <div class="card-body row">
                    <div class="col text-center my-auto">
                        <img src="{{url('/')}}{{ $data->img }}" alt=""> 
                        <h1 class="font-weight-bold text-primary">{{$data->name ?? "-"}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
