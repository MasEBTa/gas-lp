@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<edit-fitur 
  :api-token="'{{ session('api_token') }}'"
  :csrf-token="'{{ csrf_token() }}'"
  :base-asset="'{{ asset('storage') }}'"
></edit-fitur>
@endsection

@section('script')
<script>
  // script
</script>
@endsection
