@extends('layouts.admin')

@section('content')
    <div class=containter mt-5>  
        <div class= "row">
            <div class="col-md-12" >
                <div class="card">
                    <div class="card-header ">  
                        <h4>Slider 
                            <a href ="{{url('add-slider')}}" class="btn btn primary float-right">Add slider</a> 
                        </h4>     
                    </div>
                            <div class=" card-body ">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Heading</th>
                                        <th>Image</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                    <tbody>
                                        @foreach($slider as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->Heading}}</td>
                                                <td>
                                                    <img src="{{asset('uploads/slider/'.$item->image}}" width="100px" alt="Slider Image">
                                                </td>    
                                                
                                                <td>@if($item->status == '1')
                                                        hidden
                                                    @else
                                                        invisible
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ url('edit-slider/'.$item->id }}" class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                     

                                    </tbody>

                        
                                </table>
                             </div>
                </div>       
            </div>       
            
        </div>     
        
    </div>

@endsection