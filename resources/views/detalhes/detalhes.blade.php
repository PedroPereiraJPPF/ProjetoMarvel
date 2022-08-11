@extends('layouts.main')

@section('title', 'Marvel')

@section('content')

@if(Auth::check())


<div class='hqContainer'>

</div>
<script src="/js/apiDetalhes.js">


</script>

@else

<script>window.location = "/";</script>

@endif

@endsection