@extends('layouts.app')

@section('content')
<div class="container">
    @if($data->status == 0)
    <div class="alert alert-danger" role="alert">
        I'm sorry but you're not online!
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <img src="{{ $data->picture }}" alt="{{ $data->firstname }}" class="">
            </div>  
            <br>
            @if($data->status == 0)
            <a href="" class="btn btn-danger btn-block disabled"><i class="fa fa-warning"></i>&nbsp;Offline</a>
            @else
            <a href="{{ route('prof') }}" class="btn btn-success btn-block"><i class="fa fa-refresh fa-spin"></i>&nbsp;Randomize</a>
            @endif
        </div>
        <div class="col-md-8">
            <fieldset>
                <legend>Profile </legend>
                
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td width="10px">:</td>
                        <td>{{ $data->titlename }} {{ $data->firstname }} {{ $data->lastname }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $data->email }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td>{{ $data->dob }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{ $data->phone }}</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>:</td>
                        <td>{{ $data->cell }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            {{ $data->stnumber }} {{ $data->stname }}<br>
                            {{ $data->stcity }} <br>
                            {{ $data->ststate }}, {{ $data->stcountry }} {{ $data->stpostcode }}
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </div>
</div>
@endsection
