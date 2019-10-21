@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h1>Reports</h1>
                    <a  class="btn btn-primary" href="/expense_reports/create">Create New Report</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <td>Title</td>
                            <td>Editar</td>
                            <td>Eliminar</td>
                        </tr>
                        @foreach ($expenseReports as $expenseReport)
                            <tr>        
                                <td><a href="/expense_reports/{{$expenseReport->id}}">{{$expenseReport->title}}</a></td>
                                <td><a href="/expense_reports/{{$expenseReport->id}}/edit">Edit</a></td>
                                <td><a href="/expense_reports/{{$expenseReport->id}}/confirmDelete">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>  
                </div>
            </div>                        
        </div>
    </div>
</div>

@endsection