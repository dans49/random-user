@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <img src="{{ $res[0]['picture']['large'] }}" alt="{{ $res[0]['name']['first'] }}" class="">
                <div class="card-body">
                    {{ $res[0]['name']['first'] }} {{ $res[0]['name']['last'] }} 
                </div>
            </div>  
            <br>
            <a href="{{ route('prof') }}" class="btn btn-success"><i class="fa fa-refresh fa-spin"></i>&nbsp;Randomize</a>
        </div>
        <div class="col-md-8">
            <fieldset>
                <legend>Profile </legend>
                
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td width="10px">:</td>
                        <td>{{ $res[0]['name']['title'] }} {{ $res[0]['name']['first'] }} {{ $res[0]['name']['last'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $res[0]['email'] }}</td>
                    </tr>
                    <tr>
                        <?php
                        $exp = explode('T', $res[0]['dob']['date']);
                        $exp2 = explode('-', $exp[0]);
                        $dob = $exp2[2].'/'.$exp2[1].'/'.$exp2[0];
                        ?>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td>{{ $dob }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{ $res[0]['phone'] }}</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>:</td>
                        <td>{{ $res[0]['cell'] }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            {{ $res[0]['location']['street']['number'] }} {{ $res[0]['location']['street']['name'] }}<br>
                            {{ $res[0]['location']['city']}} <br>
                            {{ $res[0]['location']['state'] }}, {{ $res[0]['location']['country'] }} {{ $res[0]['location']['postcode'] }}
                        </td>
                    </tr>
                </table>
            </fieldset>
            
        </div>
    </div>
</div>
@endsection
