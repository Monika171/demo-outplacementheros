@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger text-center text-uppercase">
            <h3><strong>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>&emsp;&emsp;
              {{$error}}</strong></h3><br>
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class="alert alert-success text-center text-uppercase">
            <h3><strong> {{session('success')}}</strong></h3>
        </div>
@endif

@if(session('error'))
<div class="alert alert-danger text-center text-uppercase">
    <h3><strong>
      <i class="fa fa-exclamation-circle" aria-hidden="true"></i>&emsp;&emsp;
      {{session('error')}}</strong></h3>
</div>
@endif