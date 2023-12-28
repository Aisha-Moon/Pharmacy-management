@if(!empty($getRecord))
<form action="{{ url('admin/medicines/edit/'.$getRecord->id) }}" method="post" enctype="multipart/form-data">
 @else
 <form action="{{ url('admin/medicines/add') }}" method="post" enctype="multipart/form-data">

@endif
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Medicine Name <span style="color:red;">*</span></label>
        <div class="col-sm-10">
            <input type="text" name="name" value="{{ old('name',!empty($getRecord) ? $getRecord->name : '' )}}" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="packing" class="col-sm-2 col-form-label">Packing<span style="color:red;">*</span></label>
        <div class="col-sm-10">
            <input type="text" name="packing" value="{{ old('packing',!empty($getRecord) ? $getRecord->packing : '' )}}" class="form-control" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="generic_name" class="col-sm-2 col-form-label">Generic Name<span style="color:red;">*</span></label>
        <div class="col-sm-10">
            <input type="text" name="generic_name" value="{{ old('generic_name',!empty($getRecord) ? $getRecord->generic_name : '' )}}" class="form-control" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="supplier_name" class="col-sm-2 col-form-label">Supplier Name<span style="color:red;">*</span></label>
        <div class="col-sm-10">
            <input type="text" name="supplier_name" value="{{ old('supplier_name',!empty($getRecord) ? $getRecord->supplier_name : '' )}}" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-10">
    <button type="submit" class="btn btn-success">Save Medicine</button>
        </div>
        </div>
</form>
