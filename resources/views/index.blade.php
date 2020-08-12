@extends('layout.master')

@section('main_container')
<h4><b>List Page</b></h4>
<div class="container-fluid pt-4 pb-2" style="background: #eee;">
    <div class="container-fluid p-3" style="background: #FFFFFF;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14);">
        
        <div class="row no-gutters mb-3">
            <div class="col-10">
                <h5>Informations</h5>
            </div>
            <div class="col-2">
                <a href="{{URL::to('add')}}" class="btn btn-success float-right">Add Page</a>
            </div>
        </div>

        @if(session()->has('success'))
        <div class="alert alert-success" id="success_div">
            {{ session()->get('success') }}
        </div>
        @endif
        <table class="table" id="person_table" style="width: 100% !important;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Language Skills</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                
          </tbody>

        </table>
    </div>
</div>

<style type="text/css">
    .fa-window-close{
        color: red;
    }

    .fa-pen-square{
        color: green;
    }
</style>
@endsection