@extends("layouts.application")

@section("content")

<section id="login" class="panel panel-primary form-login-size">
    	    <div class="panel-body">
                <h1 align="center">Sign In</h1>
  {!! Form::open(['url' => 'sessions', 'class' => 'form-horizontal', 'role' => 'form']) !!}

    <div class="form-group">

      <div class="col-md-12">
      {!! Form::label('email', 'Email', array('class' => '')) !!}

        {!! Form::text('email', null, array('class' => 'form-control')) !!}

        {!! $errors->first('email') !!}
    	</div>

      <div class="clear"></div>

    </div>


    <div class="form-group">
      <div class="col-md-12">

      {!! Form::label('password', 'Password', array('class' => '')) !!}


        {!! Form::password('password', array('class' => 'form-control')) !!}

        {!! $errors->first('password') !!}
                        <div class="checkbox pull-left">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label btn-primary" style="background: white">Show password</span>
                        </div>
<span class="pull-right" style="margin-top:10px"><i>{!! link_to('reset-password/', 'Forgot Password') !!}</i></span>
    </div>


    </div>




    <div class="form-group" style="margin-top:0px">



      <div class="col-md-12">

        {!! Form::submit('Login', array('class' => 'btn btn-inverse btn-raised btn-lg btn-block')) !!}

      </div>
      <div class="clear"></div>

    </div>

  {!! Form::close() !!}
    </div> <!-- /.container -->
</section>
@stop