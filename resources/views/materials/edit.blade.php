@extends('adminlte::page')

@section('title','Edit Material')

@section('content_header')
<h1>Edit Material</h1>
@stop

@section('content')

<form action="{{route('materials.update',$material->id)}}"
method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Category</label>

<select name="category_id"
class="form-control">

@foreach($categories as $cat)

<option value="{{$cat->id}}"
{{ $cat->id == $material->category_id ? 'selected' : '' }}>

{{$cat->name}}

</option>

@endforeach

</select>
</div>

<div class="form-group">
<label>Material Name</label>

<input type="text"
name="name"
value="{{$material->name}}"
class="form-control">
</div>

<div class="form-group">
<label>Opening Balance</label>

<input type="number"
step="0.01"
name="opening_balance"
value="{{$material->opening_balance}}"
class="form-control">
</div>

<button class="btn btn-success mt-2">
Update
</button>

</form>

@stop