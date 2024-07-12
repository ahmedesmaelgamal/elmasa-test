{{-- the php renderd code is stored in storage->framework->views --}}
@extends('layouts.sidebar'){{--applied after the hole page --}}
@if ($username == "ahmed")
    <h1>hi ahmed</h1>
@else
    <h1>hi other user</h1>
@endif