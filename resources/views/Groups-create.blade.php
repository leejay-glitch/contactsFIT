<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div>
<!-- resources/views/create-groups.blade.php -->

@extends('layouts.app')

@section('title', 'Create Wise and Not Wise Groups')

@section('content')
<div class="container">
    <h1>Create Wise and Not Wise Groups</h1>
    <form method="POST" action="{{ route('groups.create-wise-groups') }}">
        @csrf
        <button type="submit">Create Groups</button>
    </form>
</div>
@endsection
