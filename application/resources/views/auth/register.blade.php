<x-layout>
    <form action="{{ route('register') }}" method="POST" class="">
        @csrf
        <h2>Create a new account</h2>
        <label for="name">Name</label>
        <input type="text" name="name" required value="{{ old('name') }}">

        <label for="email">Email</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button class="btn mt-4">Register</button>
    </form>
</x-layout>
