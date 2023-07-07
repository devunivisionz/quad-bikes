<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h4 class="header-title">{{ $pageName }}</h4>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger mb-2 goBack"><i class="mdi mdi-step-backward-2 me-2"></i>Back To Listing</button>
                </div>
            </div>
            <form id="submit-form" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @if(isset($objData->id))
                    <input type="hidden" value="{{ $objData->id }}" name="id">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="@if(isset($objData->name) && $objData->name){{ $objData->name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" required rows="4">@if(isset($objData->description) && $objData->description){{ $objData->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" name="code" class="form-control " id="code" value="@if(isset($objData->code) && $objData->code){{ $objData->code }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-date" class="form-label">Exipry Date</label>
                            <input type="date" name="expiry_date" class="form-control" id="example-date" value="@if(isset($objData->expiry_date)){{ date('Y-m-d',strtotime($objData->expiry_date)) }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                                <img src="{{ asset('admin/uploads/coupon/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="active" name="status" class="form-check-input" value="1" @if(isset($objData) && $objData->status == 1 ) checked @endif checked>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="0" @if(isset($objData) && $objData->status == 0 ) checked @endif>
                                    <label class="form-check-label" for="inactive">InActive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="flate" name="type" class="form-check-input" value="0" @if(isset($objData) && $objData->type == 0) checked @endif checked>
                                    <label class="form-check-label" for="flate">Flate</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="percentage" name="type" class="form-check-input" value="1" @if(isset($objData) && $objData->type == 1) checked @endif>
                                    <label class="form-check-label" for="percentage">Percentage</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" min="1" id="amount" class="form-control" name="amount" value="@if(isset($objData->amount) && $objData->amount){{ $objData->amount }}@endif" required>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->