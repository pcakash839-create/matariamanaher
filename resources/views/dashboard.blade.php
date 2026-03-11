@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')

<div style="font-size:20px">
<ol>
<li>
    <div style="margin-bottom:10px;">
        <a href="/categories">Create Categories</a>
    </div>
</li>
<li>
    <div style="margin-bottom:10px;">
        <a href="/materials">Create materials</a>
    </div>
</li>
<li>
    <div style="margin-bottom:10px;">
        <a href="/inward/create">Create inward</a>
    </div>
</li>
@can('admin')
    <li>
    <div style="margin-bottom:10px;">
        <a href="/users">Add new User</a>
    </div>
</li>
@endcan

<li>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
    <div style="margin-bottom:10px;">
        <a href="/logout">Logout</a>
    </div>
    </li>
</ol>

</div>

<script>

function logout() {

    fetch('/logout', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer {{ session("api_token") }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        window.location.href = "/login";
    });

}

</script>

@stop