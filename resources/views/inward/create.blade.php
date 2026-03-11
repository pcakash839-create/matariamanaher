@extends('adminlte::page')

@section('title','Inward / Outward')

@section('content_header')
<h1>Material Transaction</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<form action="{{route('inward.store')}}" method="POST">

@csrf

<div class="form-group">

<label>Category</label>

<select id="category"
class="form-control">

<option>Select Category</option>

@foreach($categories as $cat)

<option value="{{$cat->id}}">
{{$cat->name}}
</option>

@endforeach

</select>

</div>

<div class="form-group">

<label>Material</label>

<select name="material_id"
id="material"
class="form-control">

<option>Select Material</option>

</select>

</div>

<div class="form-group">

<label>Date</label>

<input type="date"
name="date"
class="form-control">

</div>

<div class="form-group">

<label>Quantity</label>

<input type="number"
step="0.01"
name="quantity"
class="form-control">

<small>
Positive = Inward  
Negative = Outward
</small>

</div>

<button class="btn btn-success mt-2">
Save
</button>

</form>


<script>

document.getElementById('category').addEventListener('change', function(){

let category = this.value;

fetch('/get-materials/'+category)

.then(res => res.json())

.then(data => {

let material = document.getElementById('material');

material.innerHTML = '';

data.forEach(m => {

material.innerHTML +=
`<option value="${m.id}">
${m.name}
</option>`;

});

});

});

</script>
@stop