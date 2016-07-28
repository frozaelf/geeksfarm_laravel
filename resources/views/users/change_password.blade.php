@extends("layouts.application")

@section("content")

<section id="login" class="panel panel-primary form-login-size">
    	    <div class="panel-body">
                <h1 align="center">Change Password</h1>
  {!! Form::open(['url' => 'process-change-password/'.$forgot_token, 'class' => 'form-horizontal', 'role' => 'form']) !!}

     <div class="form-group">

       {!! Form::label('password', 'Password', array('class' => 'col-lg-4 control-label')) !!}

       <div class="col-lg-8">

         {!! Form::password('password', array('class' => 'form-control')) !!}

         {!! $errors->first('password') !!}

       </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">

    {!! Form::label('password_confirmation', 'Password Confirm', array('class' => 'col-lg-4 control-label')) !!}

      <div class="col-lg-8">

        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!} 

      </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">


      <div class="col-lg-12">

        {!! Form::submit('Update Password', array('class' => 'btn btn-warning btn-raised btn-lg btn-block')) !!}

      </div>

      <div class="clear"></div>

    </div>

  {!! Form::close() !!}
    </div> <!-- /.container -->
</section>

@stop