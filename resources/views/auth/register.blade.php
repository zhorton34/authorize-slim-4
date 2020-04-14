@extends('layouts.app')

@section('content')
    <register inline-template>
        <div>
            <button @click="hello">
                Hello World
            </button>
            <h1>Register</h1>
        </div>
    </register>
@endsection
