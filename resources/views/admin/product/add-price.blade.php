@extends('admin.product.layout', [
    'title' => ( $title ?? 'Add Price' )
])

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <form class="form-validate" id="dynamic_form" novalidate="novalidate" method="POST" enctype='multipart/form-data'>
        @csrf
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Product Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required="" value="$product->name">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="brand_id">Brand</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select select2-hidden-accessible" id="brand_id" name="brand_id" data-placeholder="Select a brand" required="" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true">
                                <option value="">Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="category_id">Category</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select select2-hidden-accessible" id="category_id" name="category_id" data-placeholder="Select a category" required="" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true">
                                <option label="empty" value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="">Add Price</label>
                    <table class="" id="dynamicAddRemove">
                        <tr>
                            <td><input type="text" name="size[0]" placeholder="Enter size" class="form-control" />
                            </td>
                            <td><input type="text" name="price[0]" placeholder="Enter price" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Price</button></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="discription">Discription</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="discription" name="discription" placeholder="Write your discription" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="ingredient">Ingredient</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="ingredient" name="ingredient" placeholder="Write your ingredient" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="direction">Direction</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="direction" name="direction" placeholder="Write your direction" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" id="button" class="btn btn-lg btn-primary">Save Informations</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="size[' + i +
                ']" placeholder="Enter size" class="form-control" /></td> <td><input type="text" name="price['+ i +
                ']" placeholder="Enter price" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

        $('dynamic_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                url: '{{route("product.price")}}',
                type: 'POST',
                data: $(this).serialize(),
                dataType:'json'
                // success:function(data)
                // {
                //     if(data.error)
                //     {
                //         var error_html='';
                //         for(var count=0; count<data.error.length)
                //     }
                // }
            });
        })

    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $("#button").click(function(e){
                e.preventDefault();

                $.ajax({
                    url: "{{ route('product.price') }}",
                    type:'POST',
                    data: $(this).serialize(),
                    dataType:'json',
                    success: function(data) {
                      printMsg(data);
                    }
                });
            }); 
        });
    </script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        
        $(document).ready(function(){
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number){
                var html='<tr>';
                html+='<td><input type="text" name="price[]" class="form-control"/></td>';
                html+='<td><input type="text" name="size[]" class="form-control"/></td>';
                if(number>1){
                    html+='<td><button type="button" name="remove" id="remove" class"btn btn-danger">Romove</button></td></tr>';
                    $('tbody').append(html);
                }else{
                    html+='<td><button type="button" name="add" id="add" class"btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }
            }
            $('#add').click(function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click','#remove',function(){
                count--;
                dynamic_field(count);
            })
            $('#dynamic_form').on('submit',function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{route('product.store')}}',
                    method:'post',
                    data:$this.serialize(),
                    dataType:'json',
                    // beforeSend:function(){
                    //     $('#save').attr
                    // }
                    // success:function(data){
                    //     if()
                    // }
                })
            })
        });

    </script> -->
@endpush