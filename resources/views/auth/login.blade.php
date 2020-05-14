@extends('layouts.app')

@section('content')
<v-row class="justify-center align-content">
    <v-col md="4">
        <v-card :raised="true">
            <v-card-text >
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <v-text-field
                            color="indigo" value="{{ old('email') }}"
                            type="email" required autocomplete="email" autofocus
                            id="email" name="email" @error('email') error @enderror
                            label="{{ __('E-Mail Address') }}">
                        </v-text-field>

                        @error('email')
                        <span class="invalid-feedback " role="alert">
                            <strong class="red--text">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div>   
                        <v-text-field 
                            color="indigo"
                            type="password"
                            required @error('password') error @enderror
                            id="password" name="password" autocomplete="current-password"
                            label="{{ __('Password') }}">
                        </v-text-field>

                        @error('password')
                        <span class=" mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <v-checkbox
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                        label="{{ __('Remember Me') }}">
                    </v-checkbox>
                    
                    <div class="d-flex justify-space-between align-center">
                        @if (Route::has('password.request'))
                            <v-btn text  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </v-btn>
                        @endif
    
                        <v-btn type="submit" color="primary">{{ __('Login') }}
                            <v-icon right>mdi-lock</v-icon> 
                        </v-btn>
                    </div>
                  
                </form>
            </v-card-text>
        </v-card>
    </v-col>
</v-row>
@endsection
