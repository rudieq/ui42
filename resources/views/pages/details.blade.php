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
                            <td>{{$data->address ?? "-"}}</td>
                        </tr>
                        <tr>
                            <th>Telefón:</th>
                            <td>{{$data->phone ?? "-"}}</td>
                        </tr>
                        <tr>
                            <th>Fax:</th>
                            <td>{{$data->fax ?? "-"}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                @if(isset($data->email))
                                <a class="text-dark" href="mailto:{{$data->email}}">{{$data->email}}</a>
                                @else
                                "-"
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Web:</th>
                            <td>
                                @if(isset($data->web))
                                <a class="text-dark" href="{{$data->web}}">{{$data->web}}</a>
                                @else
                                "-"
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Zemepisné súradnice:</th>
                            <td>{{($data->geo_latitude && $data->geo_longitude) ? ($data->geo_latitude . ", " . $data->geo_longitude) : "-"}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-body row">
                    <div class="m-auto">
                        <h1 class="font-weight-bold text-primary mx-auto">{{$data->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
