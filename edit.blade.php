@extends('layouts.admin')

@section('content')
    <div class=containter mt-5>  
        <div class= "row">
            <div class="col-md-12" >
                @if (session('status'))
                    <h4>
                        <a href="{{  url('home-slider') }}" class="btn btn-danger btn-sm float-right">
                            BACK
                        </a>
                    </h4>
                @endif
                <div class="card">
                    <div class="card-header ">  
                        <h4>Edit Slider
                            <a href ="{{  url('home-slider') }}" class="btn btn-danger primary float-right">Back</a> 
                        </h4>     
                    </div>
                            <div class=" card-body ">
                                    <form action="{{ url('update-slider/' .$slider->id) }}" method="POST" enctype="multipart/form-data" >
                                
                                @method('PUT')

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{$slider->heading}}">
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Description</label>
                                    <textarea name="description" class="form-control">{{$slider->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Link</label>
                                    <input type="text" class="form-control" name="link" value="{{$slider->link}}">
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Link Name</label>
                                    <input type="text" class="form-control" name="link_name" value="{{$slider->link_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Slider Image uploadl</label>
                                    <input type="file" class="form-control" name="image">
                                    <img src="{{asset('uploads/slider/'.$slider->image}}" width="100px" alt="Slider Image">
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Status</label>
                                    <input type="checkbox" class="form-control" name="status" {{$slider->status =='1' checked':''}}> 1= Visible 0=Hidden
                                </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                    </form>



                             </div>
                </div>       
            </div>       
            
        </div>     
        
    </div>
<
@endsection