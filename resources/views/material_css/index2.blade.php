@extends('layout.master')

@section('main_container')

<h4><b>List Page</b></h2>
<div class="container px-2 pt-4 pb-2" style="background-color: #efefef;">
    <div class="table-responsive" style="background-color: #FFFFFF;">
        <!-- <i class="fas fa-clipboard-list fa-2x pink-text ml-2" style="position:absolute;margin-top: -15px;"></i> -->
        <img src="{{URL::to('material/img/assignment-24px.svg')}}">
        <span class="pt-5 ml-5">Informations</span>
        <table class="table mb-0" style="border-radius: 5px;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection