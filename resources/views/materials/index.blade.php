@extends('adminlte::page')

@section('title','Materials')

@section('content_header')
<h1>Materials</h1>
@stop

@section('content')

<a href="{{route('materials.create')}}"
class="btn btn-primary mb-3">
Add Material
</a>

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Category</th>
<th>Name</th>
<th>Opening Balance</th>
<th>Current Balance</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($materials as $m)

<tr>

<td>{{$m->id}}</td>

<td>{{$m->category->name}}</td>

<td>{{$m->name}}</td>

<td>{{$m->opening_balance}}</td>

<td>{{$m->current_balance}}</td>

<td>

<a href="{{route('materials.edit',$m->id)}}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{route('materials.destroy',$m->id)}}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@stop