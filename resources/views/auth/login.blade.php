@extends('layouts.empty')

@section('content')
<section>
        
        
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="imgcontainer">
            <img src="{{asset('/images/person.png')}}" alt="Avatar" class="avatar">
        </div>

        <div class="container">

            <label for="email"><b>Email</b></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="email-error">
                    <strong>{{ $message }}<br><br></strong>
                </span>
            @enderror

            <label for="password"><b>Senha</b></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="password-error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <button type="submit">Login</button>

            <label>
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Mantenha-me conectado
            </label>


        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancelar</button>
                @if (Route::has('password.request'))
                    <span class="psw">Esqueceu <a href="{{ route('password.request') }}">a senha?</a></span>
                @endif
            
        </div>
    </form>
            

</section>
@endsection
