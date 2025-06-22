@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if ($hash)
    <a class="btn btn-primary"
        href="{{ route('magicLinks.index') }}">
        {{ $hash}}
    </a>
    @else

    <div class="alert alert-warning">
        <strong>Warning!</strong> No magic link hash found.
    </div>
    @endif

</div>
@endsection