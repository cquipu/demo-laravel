@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                <h1>Edit Report {{$report->id}}</h1>
                    <a  class="btn btn-secondary" href="/expense_reports">Back</a>
                </div>
            </div>
    
            <div class="row">
                <div class="col">
                <form action="/expense_reports/{{$report->id}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Type a title">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>                    
                    </form>
                </div>
            </div>             
        </div>
    </div>
</div>
@endsection