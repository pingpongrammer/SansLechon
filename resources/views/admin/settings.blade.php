@extends('layout.admin-dashboard')
@section('content')

<form action="/settingsStore" method="post" enctype="multipart/form-data">
@csrf
<h3>Settings</h3>
<p>Image</p>
<input class="border" type="file" name="img">

<p>Shop</p>
<input class="border" type="text" name="shop">

<p>Type</p>
<input class="border" type="text" name="type">

<p>Description</p>
<input class="border" type="text" name="description">

<p>Small Price</p>
<input class="border" type="text" name="small">

<p>Medium Price</p>
<input class="border" type="text" name="medium">

<p>Large Price</p>
<input class="border" type="text" name="large">

<p>Extra Large Price</p>
<input class="border" type="text" name="extraLarge">


<div><button class="border bg-blue-600 p-2 mt-2" type="submit">submit</button></div>


</form>
@endsection