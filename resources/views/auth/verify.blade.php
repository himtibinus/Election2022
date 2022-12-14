@extends('layouts.auth')

@section('content')
<div id="suggest">
    <h1 class="h2 fw-bold text-shadow">Input your BINUSIAN email address</h1>
    <h2 class="h3">(binus.ac.id or binus.edu)</h2>
</div>
<div id="code-container" class="blur">
    <form action="{{ route('email', Auth::user()->id) }}" method="post" id="validate-form" name="validateform" class="px-sm-5 pt-3 pb-4">
        @csrf
        <input type="text" name="email" id="code" value="{{ old('email') }}" placeholder="e.g. example@binus.ac.id">
        @if (session('message'))
            <p class="pt-2 mb-0">
                {{ session('message') }}
            </p>
        @endif
    </form>
</div>

@endsection
