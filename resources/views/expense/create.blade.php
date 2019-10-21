@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row">
        <div class="col">
            <h1>New Expense</h1>
        <a  class="btn btn-secondary" href="/expense_reports/{{$report->id}}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach                        
                    </ul>
                </div>
            @endif

            <form action="/expense_reports/{{$report->id}}/expenses" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Type a description" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label for="">Amount:</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Type a amount" value="{{old('amount')}}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                
            </form>
        </div>
    </div>              
</div>

@endsection