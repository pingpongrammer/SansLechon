@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<div class="w-5/6 block mx-auto">

    
              
    <form method="POST" action="/freebiesUpdate/{{$freeb1->id}}" enctype="multipart/form-data" >
        {{-- @method('PUT') --}}
        @csrf
        <h3 class="text-lg">Update Freebies</h3>
    
        <div class="flex justify-center items-center">
            <div>
                <p>Image</p>
                <img class="img-fluid" class="preview" id="preview" src="{{$freeb1->img ? asset ('storage/' .$freeb1->img) : asset('./assets/img/user-profile.jpg')}}" alt=""  style="width:150px"/>
                <input class="border" type="file" name="img" id="profile_image">
            </div>

        </div>
    
    
    <div class="flex justify-between flex-col sm:flex-row mt-4">
        <div>
            <p>Shop</p>
            <select class="border rounded-md py-1 px-2 w-52" name="shop" required>
                <option value="">-Select Shop- </option>
                <option value="sweet bites" {{$freeb1->shop=="sweet bites" ? 'selected' :''}}>Sweet Bites</option>
                <option value="mombizz" {{$freeb1->shop=="mombizz" ? 'selected' :''}}>Mombizz</option>
             </select>
        </div>
    
        <div>
            <p>Type</p>
            <select class="border rounded-md py-1 px-2 w-52" name="type" required>
                <option value="">-Select Type- </option>
                <option value="cake" {{$freeb1->type=="cake" ? 'selected' :''}}>Cake</option>
                <option value="bilao" {{$freeb1->type=="bilao" ? 'selected' :''}}>Bilao</option>
             </select>
        </div>
        
        <div>
            <p>Description</p>
            <input class="border rounded-md py-1 px-2" type="text" name="description" value="{{$freeb1->description}}">
        </div>
    </div>
    
            <div class="flex justify-between flex-col sm:flex-row mt-4">
                <div>
                    <p>Small Price</p>
                    <input class="border rounded-md py-1 px-2" type="text" name="small" value="{{$freeb1->small}}">
                </div>
    
                <div>
                    <p>Medium Price</p>
                    <input class="border rounded-md py-1 px-2" type="text" name="medium" value="{{$freeb1->medium}}">    
                </div>
    
                <div>
                    <p>Large Price</p>
                    <input class="border rounded-md py-1 px-2" type="text" name="large" value="{{$freeb1->large}}">
                </div>
    
                <div>
                    <p>Extra Large Price</p>
                    <input class="border rounded-md py-1 px-2" type="text" name="extraLarge" value="{{$freeb1->extraLarge}}">
                </div>
    
            </div>
    

                    <div class="block text-right mt-2 text-white">
                        <button type="submit" class="border bg-green-600 mt-2 px-6 py-2 rounded-lg hover:bg-green-800" type="submit">Update</button>
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