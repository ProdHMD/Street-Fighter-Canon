{{--
  Template Name: 02 - Timeline
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-02-timeline')
  @endwhile
@endsection
