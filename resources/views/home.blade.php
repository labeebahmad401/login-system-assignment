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
                    
                    <a href="{{ route('create.phone.record') }}">Add Phone Number</a>

                    <br/>
                    <br/>

                    @if( session('message') )
                        <div>{{ session('message') }}</div>
                    @endif

                    
                    <table width="100%">
                        
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>

                        @foreach( $phoneDirRecords as $item )
                            
                            <tr>
                                <td> {{ $item->firstname }}</td>
                                <td> {{ $item->lastname }}</td>
                                <td> {{ $item->phone }}</td>
                                <td> <a href="{{ route('edit.phone.record', $item->id) }}"><button>Edit</button></a> 
                                    <form action="{{ route('delete.phone.record', $item->id ) }}"  style="display:inline;" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        
                                        <button>Delete</button>
                                    </form> 
                                </td>

                            </tr>

                        @endforeach
                        
                    </table>

                    @if( count( $phoneDirRecords ) == 0 )
                        <div>No records found.</div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
