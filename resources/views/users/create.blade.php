@extends("layouts.application")

@section("content")

<section id="login" class="panel panel-primary form-login-size">
    	    <div class="panel-body">
                <h1 align="center">Sign Up</h1>
  {!! Form::open(['url' => 'users', 'class' => 'form-horizontal', 'role' => 'form']) !!}

    <div class="form-group">

      {!! Form::label('email', 'Email', array('class' => 'col-lg-4 control-label')) !!}

      <div class="col-lg-8">

        {!! Form::text('email', null, array('class' => 'form-control')) !!}

        {!! $errors->first('email') !!}

      </div>

      <div class="clear"></div>

    </div>


    <div class="form-group">

      {!! Form::label('name', 'Username', array('class' => 'col-lg-4 control-label')) !!}

      <div class="col-lg-8">

        {!! Form::text('name', null, array('class' => 'form-control')) !!}

        {!! $errors->first('name') !!}

      </div>

      <div class="clear"></div>

    </div>


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

        {!! Form::submit('Signup', array('class' => 'btn btn-success btn-raised btn-lg btn-block')) !!}

      </div>

      <div class="clear"></div>

    </div>

  {!! Form::close() !!}
    </div> <!-- /.container -->
</section>

@stop