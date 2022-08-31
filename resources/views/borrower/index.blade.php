@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-sm-12">
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
    <h1 class="display-3">borrowers</h1>    
    

    <div>
    <a style="margin: 19px;" href="{{ route('borrower.create')}}" class="btn btn-primary">New borrower</a>
    </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Monthly Sales</td>
          <td>Monthly Expense</td>
          <td>Other Finance</td>
          <td>Business Name </td>
          <td>Business Address</td>
          <td>Business City</td>
          <td>Business State</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($borrower as $borrower)
        <tr>
            <td>{{$borrower->id}}</td>
            <td>{{$borrower->monthly_sales}}</td>
            <td>{{$borrower->monthly_expenses}}</td>
            <td>{{$borrower->other_financing_amount}}</td>
            <td>{{$borrower->legal_business_name}}</td>
            <td>{{$borrower->business_physical_city}}</td>
            <td>{{$borrower->business_physical_province}}</td>

            <td>
                <a href="{{ route('borrower.edit',$borrower->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('borrower.destroy', $borrower->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection