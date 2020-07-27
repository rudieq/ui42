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
                    <table class="m-auto">
                        <tr>
                            <th>Meno starostu:</th>
                            <td>{{$data->mayor ?? "-"}}</td>
                        </tr>
                        <tr>
                            <th>Adresa obecného úradu:</th>
                            <td>{{$data->address_streetName ?? "-"}} {{$data->address_buildingNumber ?? "-"}}, {{$data->address_postcode ?? "-"}} {{$data->address_city ?? "-"}}</td>
                        </tr>
                        <tr>
                            <th>Telefón:</th>
                            <td>
                                @if($data->phone_prefix && $data->phone)
                                    {{$data->phone_prefix ?? "-"}} / {{$data->phone ?? "-"}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Fax:</th>
                            <td>
                                @if($data->phone_prefix && $data->fax)
                                    {{$data->phone_prefix ?? "-"}} / {{$data->fax ?? "-"}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                {{$data->email ?? "-"}}
                                {{-- @if(isset($data->email))
                                <a class="text-dark" href="mailto:{{$data->email}}">{{$data->email}}</a>
                                @else
                                -
                                @endif --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Web:</th>
                            <td>
                                {{$data->web ?? "-"}}
                                {{-- @if(isset($data->web))
                                <a class="text-dark" href="{{$data->web}}">{{$data->web}}</a>
                                @else
                                -
                                @endif --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Zemepisné súradnice:</th>
                            <td>{{(isset($data->geo_latitude) && isset($data->geo_longitude)) ? ($data->geo_latitude . ", " . $data->geo_longitude) : "-"}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-body row">
                    <div class="m-auto">
                        <h1 class="font-weight-bold text-primary mx-auto">{{$data->name ?? "-"}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
