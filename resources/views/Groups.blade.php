@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<div class="container">
    <h1>Groups</h1>

    <p>
        <a href="{{ url('/groups/create') }}">
            <button type="button">Create Group</button>
        </a>
    </p>
    
    <p>
        <a href="{{ route('assign-to-group-form') }}">
            <button type="button">Group Contacts</button>
        </a>
    </p>
    
    <div class="container">
    <div class="row">
        <div class="col-md-6" style="float:left;">
            @include('groupdetails', ['group' => $wiseGroup, 'isWiseGroup' => true])
        </div>

        <div class="col-md-6" style="float:right;">
            @include('groupdetails', ['group' => $notWiseGroup, 'isWiseGroup' => false])
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
