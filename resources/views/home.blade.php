@extends('layouts.app')

@php
  $dateStart = '2022-10-07T06:00:00Z';
  $dateEnd = '2022-10-21T16:59:00Z';
@endphp

@section('content')
    <div class="container frosted-glass text-center px-3 px-md-5 py-5">
        <div class="content-1">
            <h2 class="pb-3 fw-bold">10-11th October 2022</h2>
            <h1 class="pb-3 fw-bold text-uppercase">HIMTI Election 2022</h1>
            <h3 class="text-uppercase fw-bold">One Family, One Goal!</h3>
        </div>
    </div>

    <div class="container frosted-glass text-center px-3 px-md-5 py-5">
        <div class="content-2">
            <h2 class="pb-3 fw-bold">
                @if (\Carbon\Carbon::now()->format("Y-m-d\TH:i:sP") < \Carbon\Carbon::parse($dateStart)->format("Y-m-d\TH:i:sP"))
                Voting period will open in
                @else
                We've only got
                @endif
            </h2>
            <div id="countdown" class="countdown-box" data-dateStart="{{ $dateStart }}" data-dateEnd="{{ $dateEnd }}">
                <div class="time-container fw-bold" data-time="days">
                    <h1 class="value" id="days"></h1>
                    <p class="desc">Days</p>
                </div>
                <div class="time-container fw-bold" data-time="hours">
                    <h1 class="value" id="hours"></h1>
                    <p class="desc">Hours</p>
                </div>
                <div class="time-container fw-bold" data-time="mins">
                    <h1 class="value" id="minutes"></h1>
                    <p class="desc">Minutes</p>
                </div>
                <div class="time-container fw-bold" data-time="secs">
                    <h1 class="value" id="seconds"></h1>
                    <p class="desc">Seconds</p>
                </div>
            </div>
            @if (\Carbon\Carbon::now()->format('Y-m-d H:i:s') >= \Carbon\Carbon::parse('2022-10-07 00:00:00')->format('Y-m-d H:i:s'))
                <h3 class="fw-bold pt-3">until the last voting period closed.</h3>
            @endif
        </div>
    </div>

    <h1 class="fw-bold text-center">
        Online Debate
    </h1>

    <div class="container frosted-glass text-center px-3 px-md-5 py-5">
        <div class="content-3">
            <div class="video">
                <iframe src="https://drive.google.com/file/d/1BIlQ8Y2MMipDoyrWfKstVOwr-W1NUSmp/preview" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    <h1 class="fw-bold text-center">
        Our Candidate
    </h1>

    @foreach ($candidates as $candidate)
        <div class="container frosted-glass text-center p-4 p-md-5 pb-lg-0 paslon-container">
            <div class="rapih">
                <div class="paslon01">
                    <h1 class="fw-bold pb-0">#0{{ $candidate->id }}</h1>
                </div>
                <div class="imgpaslon01">
                    <img src="{{ asset("/img/".$candidate->image) }}">
                </div>
            </div>
            <div class="tulisan pt-5">
                {{-- target --}}
                <div class="paslondescno1">
                    <h3 class="">{{ $candidate->tagline }}</h3>
                </div>
                <div class="workprogramno1 pt-5">
                    <h3 class="pb-3 fw-bold">Work Programs</h3>
                </div>
                <ol class="paslon01no1 ps-sm-3">
                    @foreach ($candidate->work_programs as $wp)
                        <li class="w-fit mx-auto ps-1 ps-sm-3 h4">{{ $wp->work_program }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    @endforeach

@endsection

@section('scripts')
<script src="{{ URL::asset('js/countdown.js') }}"></script>
@endsection
