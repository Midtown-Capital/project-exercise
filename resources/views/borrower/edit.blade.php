@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a borrower</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('borrower.update', $borrower->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
              <label for="first_name">monthly sales</label>
              <input type="text" class="form-control" name="monthly_sales"/>
          </div>
          <div class="form-group">
              <label for="last_name">monthly expenses</label>
              <input type="text" class="form-control" name="monthly_expenses"/>
          </div>
          <div class="form-group">
              <label for="email">other financing:</label>
              <input type="text" class="form-control" name="other_financing"/>
          </div>
          <div class="form-group">
              <label for="city">other financing amount:</label>
              <input type="text" class="form-control" name="other_financing_amount"/>
          </div>
          <div class="form-group">
              <label for="country">legal business name:</label>
              <input type="text" class="form-control" name="legal_business_name"/>
          </div>
          <div class="form-group">
              <label for="job_title">business physical address:</label>
              <input type="text" class="form-control" name="business_physical_address"/>
          </div> 
          <div class="form-group">
              <label for="job_title">business physical city:</label>
              <input type="text" class="form-control" name="business_physical_city"/>
          </div>  
           <div class="form-group">
              <label for="job_title">business physical province:</label>
              <input type="text" class="form-control" name="business_physical_province"/>
          </div>  
           <div class="form-group">
              <label for="job_title">business physical postal:</label>
              <input type="text" class="form-control" name="business_physical_postal"/>
          </div>  
           <div class="form-group">
              <label for="job_title">email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>  
           <div class="form-group">
              <label for="job_title">dob:</label>
              <input type="text" class="form-control" name="dob"/>
          </div>                         
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection