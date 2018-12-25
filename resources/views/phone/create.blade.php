@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br/>

                    <br/>
                    
                    
                    <form action="{{ route('save.phone.record') }}" method="POST">
                        
                        {{ csrf_field() }}
                        <label> First Name
                            <input type="text" name="firstname" />
                        </label>
                        <br/>
                        <label>
                            Last Name
                            <input type="text" name="lastname" />
                        </label>
                        <br/>
                        <label>
                            Phone Number:
                            <input type="text" name="phone" />
                        </label>
                        <br/>
                        <input type="submit" value="Save" />
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
