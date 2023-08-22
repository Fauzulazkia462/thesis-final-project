@php
    $level = Auth::user()->level;
@endphp

@if($level=='3')
@extends('layouts.main')
@section('content')
<!-- Recurments  section start-->
<div class="services_section">
    <div class="container">
        <h1 class="services_text">User data</h1>
    </div>
</div>

<div>
    <h1 class="services_text" style="color:black;">Employer data</h1>
    <table id="table1">
        <thead>
            <tr>
                <th>Company/Agency Name</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employer as $e)
                <tr>
                    <td>{{ $e->fullname }}</td>
                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->username }}</td>
                    <td>
                        <form action="/admin/reset-user-password" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $e->user_id }}">
                            <button>Reset Password</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="services_text" style="color:black;">Jobseeker data</h1>
    <table id="table2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobseeker as $e)
                <tr>
                    <td>{{ $e->fullname }}</td>
                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->username }}</td>
                    <td>
                        <form action="/admin/reset-user-password" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $e->user_id }}">
                            <button>Reset Password</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            order: [],
            // scrollX:true,
        });
    });
    
</script>

<script>
    $(document).ready(function () {
        $('#table2').DataTable({
            order: [],
            // scrollX:true,
        });
    });
    
</script>

@endsection

@endif