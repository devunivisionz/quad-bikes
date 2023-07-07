

<x-admin.master-layout>
    <!-- start page title -->
    <x-slot name="pageName">
        {{ $pageName }}
    </x-slot>
    <!-- end page title -->
    <div class="row" id="content-table my_profile">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">My Profile</h4>
                        <div id="basicwizard">
                            <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link rounded-0 py-2 open-form" data-create-href={{ $password }}> <i class="mdi mdi-face-man-profile font-18 align-middle me-1"></i> Change Password</a>
                                </li>
                            </ul>
                            <form id="submit-profile" action="{{ $edit }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                            <div class="tab-pane">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="name"> Name</label>
                                            <div class="col-md-9">
                                                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="email">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
        
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                                </div>
                            </div>
                            </form>
                            </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="row" id="content-form">
        
    </div>
    </div>
    <!-- end row -->      
<x-slot name="scripts">
<script>
$(document).on('submit','#submit-profile',function(e){
    e.preventDefault();
    $.ajax({
        type: $(this).prop('method'),
        url: $(this).prop('action'),
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if((response.error)){
                toastr.error(response.error);
            }else{
                $("#my_profile").load(window.location + " #my_profile");
                $("#authName").load(window.location + " #authName");
                toastr.success(response.success);
            }
        },error: function (error){
            toastr.error("Something is wrong please try again");
        }
    });
    toastr.options = {
    positionClass: 'toast-top-center'
};
});
</script>
</x-slot>  
</x-admin.master-layout>