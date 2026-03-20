@extends('adminlte::page')

@section('title','Create Material')

@section('content_header')
<h1>Create Material</h1>
@stop

@section('content')

<form action="{{route('materials.store')}}"
method="POST">

@csrf

<div class="form-group">
<label>Category</label>

<select name="category_id"
class="form-control">

@foreach($categories as $cat)

<option value="{{$cat->id}}">

{{$cat->name}}

</option>

@endforeach

</select>
</div>

<div class="form-group">
<label>Material Name</label>

<input type="text"
name="name"
class="form-control">
</div>

<div class="form-group">
<label>Opening Balance</label>

<input type="number"
step="0.01"
name="opening_balance"
class="form-control">
</div>

<button class="btn btn-success mt-2">
Update
</button>

</form>

@stop