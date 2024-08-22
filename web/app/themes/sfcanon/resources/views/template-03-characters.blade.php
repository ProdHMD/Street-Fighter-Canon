{{--
  Template Name: 03 - Characters
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-03-characters')
  @endwhile
@endsection
