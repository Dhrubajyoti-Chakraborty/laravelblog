@extends('layout')


@section('main-content')



@if(session()->has('message'))
<p class="alert alert-success">{{session('message')}}</p>      
@endif   

         
         <div class="row">
             <div class="col-lg-12 margin-tb">
               <h3 class="pull-left">Data Table With Full Features</h3>
             </div>
        </div>

                 
        <div class="row" align="left">
             <div class="pull-right">
             <a href="{{--route('student.create')--}}" class="btn btn-success"></a>
               </div>
        </div>



<div class="box-body">

<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>No.</td>
                  <td>Name</td>
                  <td>Phone</td>
                  <td>Address</td>
                  <td>Action</td>
                </tr>
                </thead>

                <tbody>
                
              <tr>
                  <th></th>
                  <th></th>
                  <th></th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                  <th></th>
                  <th></th>
                  <th><a href=""> <span class="glyphicon glyphicon-edit"></a></span></th>
                  <th>
                    <span class="glyphicon glyphicon-trash"></a></span>
                  </th>
                </tr>             
               
                </tbody>

                </table>
            </div>





@endsection