
<div class="card card-bordered">
    <div class="card-inner">
        <form class="form-validate" action="" id="dynamic_form" novalidate="novalidate" method="POST">
        @csrf
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Product Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="image">Image</label>
                        <div class="form-control-wrap">
                            <div class="input-group">
                                <input type="file" class="custom-file-input" id="image" name="image" required="">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            
            
            </div>
        </form>
    </div>
</div>





