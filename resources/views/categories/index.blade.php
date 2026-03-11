@extends('adminlte::page')

@section('title','Categories')

@section('content_header')
<h1>Categories</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
Add Category
</a>

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($categories as $category)

<tr>
<td>{{ $category->id }}</td>
<td>{{ $category->name }}</td>

<td>

<a href="{{ route('categories.edit',$category->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('categories.destroy',$category->id) }}"
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