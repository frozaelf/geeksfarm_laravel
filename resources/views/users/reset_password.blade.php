@extends("layouts.application")

@section("content")

<section id="login" class="panel panel-primary form-login-size">
    	    <div class="panel-body">
                <h1 align="center">Sign In</h1>
  @if (Session::has('error'))

    <div class="alert alert-danger">{!! Session::get('error') !!}</div>

  @endif

  {!! Form::open(array('url' => 'process-reset-password', 'class' => 'form-horizontal', 'role' => 'form')) !!}

    <div class="form-group">

      {!! Form::label('email', 'email', array('class' => 'col-lg-4 control-label')) !!} 

      <div class="col-lg-8">

        {!! Form::text('email', null, array('class' => 'form-control', 'autofocus' => true)) !!}

        {!! $errors->first('email') !!}

      </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">


      <div class="col-lg-12">

        {!! Form::submit('Send Reset Instruction', array('class' => 'btn btn-success btn-raised btn-lg btn-block')) !!}

      </div>

      <div class="clear"></div>

    </div>

  {!! Form::close() !!}
    </div> <!-- /.container -->
</section>

@stop