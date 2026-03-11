@extends('adminlte::page')

@section('title','Create Category')

@section('content_header')
<h1>Create Category</h1>
@stop

@section('content')

<form action="{{ route('categories.store') }}" method="POST">

@csrf

<div class="form-group">

<label>Category Name</label>

<input type="text"
name="name"
class="form-control"
placeholder="Enter category name">

</div>

<button class="btn btn-success mt-2">
Save
</button>

</form>

@stop