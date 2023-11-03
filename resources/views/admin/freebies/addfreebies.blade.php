@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<div class="w-5/6 block mx-auto">

    
<form action="/storeFreebies" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="text-lg">Add Freebies</h3>

    <div class="flex justify-center items-center">
        <div>
            <p>Image</p>
            <img class="img-fluid" class="preview" id="preview"  alt=""  style="width:150px"/>
            <input class="border" type="file" name="img" id="profile_image">
        </div>
    </div>


<div class="flex justify-between flex-col sm:flex-row mt-4">
    <div>
        <p>Shop</p>
        <select class="border rounded-md py-1 px-2 w-52" name="shop" required>
            <option value="">-Select Shop- </option>
            <option value="sweet bites">Sweet Bites</option>
            <option value="mombizz">Mombizz</option>
         </select>
    </div>

    <div>
        <p>Type</p>
        <select class="border rounded-md py-1 px-2 w-52" name="type" required>
            <option value="">-Select Type- </option>
            <option value="cake">Cake</option>
            <option value="bilao">Bilao</option>
         </select>
    </div>
    
    <div>
        <p>Description</p>
        <input class="border rounded-md py-1 px-2" type="text" name="description">
    </div>
</div>

        <div class="flex justify-between flex-col sm:flex-row mt-4">
            <div>
                <p>Small Price</p>
                <input class="border rounded-md py-1 px-2" type="text" name="small">
            </div>

            <div>
                <p>Medium Price</p>
                <input class="border rounded-md py-1 px-2" type="text" name="medium">    
            </div>

            <div>
                <p>Large Price</p>
                <input class="border rounded-md py-1 px-2" type="text" name="large">
            </div>

            <div>
                <p>Extra Large Price</p>
                <input class="border rounded-md py-1 px-2" type="text" name="extraLarge">
            </div>

        </div>

            <div class="block text-right mt-2 text-white">
                <button class="border bg-blue-600 mt-2 px-6 py-2 rounded-lg hover:bg-blue-800" type="submit">submit</button>
            </div>

    </div>
</form>

<script>
    profile_image.onchange = evt => {
        const [file] = profile_image.files
        if (file) {
        preview.style.visibility = 'visible';

        preview.src = URL.createObjectURL(file)
        }
    }
    </script>
@endsection