@extends('layouts.app')

@section('content')
<v-row class="justify-center align-content">
    <v-col md="4">
        <v-card :raised="true">
            <v-card-text >
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <v-text-field
                            color="indigo" value="{{ old('name') }}" autofocus
                            type="text" required autocomplete="name" 
                            id="name" name="name" @error('name') error @enderror
                            label="{{ __('Name') }}">
                        </v-text-field>

                        @error('name')
                        <span class="invalid-feedback " role="alert">
                            <strong class="red--text">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <v-text-field
                            color="indigo" value="{{ old('email') }}"
                            type="email" required  autocomplete="off"
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
                            id="password" name="password" autocomplete="new-password"
                            label="{{ __('Password') }}">
                        </v-text-field>

                        @error('password')
                        <span class=" mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div>   
                        <v-text-field 
                            color="indigo"
                            type="password"
                            required 
                            id="password_confirmation" name="password_confirmation"  autocomplete="new-password"
                            label="{{ __('Confirm Password') }}">
                        </v-text-field>
                    </div>

                    
                    <div class="d-flex justify-end align-center">
                        <v-btn type="submit" color="primary">{{ __('Register') }}
                            <v-icon right>mdi-account-plus</v-icon> 
                        </v-btn>
                    </div>
                  
                </form>
            </v-card-text>
        </v-card>
    </v-col>
</v-row>
@endsection
