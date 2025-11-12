<x-layout>
    <form action="">
        @csrf
        <h2>Log in to your account</h2>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button class="btn mt-4">Log in</button>
    </form>
</x-layout>
