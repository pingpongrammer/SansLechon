@if(session()->has('message'))
<div class="fullscreen-overlay " id="alertMesss">
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="text-center bg-lightgreen pt-3 w-75 col-sm-10 col-md-8">
            <i class="fa fa-check-circle display-2 text-success"></i>
            <h5 class="pt-2 mx-3">{{session()->get('message')}}</h5>
            <div class=" flex justify-center text-white pt-3">   
                <button onclick="alertCusMessage()" class="col-md-12 btn bg-success"><i class="fa fa-times-circle "></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(session()->has('error'))
<div class="fullscreen-overlay" id="alertErrr">
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="text-center bg-lightred pt-3 w-75 col-sm-10 col-md-8">
            <i class="fa fa-times-circle display-2 text-danger"></i>
            <h5 class="pt-2">{{session()->get('error')}}</h5>
            <div class=" flex justify-center text-white pt-3">   
                <button onclick="alertCusError()" class="w-100 btn btn-danger bg-alert"><i class="fa fa-times-circle "></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endif