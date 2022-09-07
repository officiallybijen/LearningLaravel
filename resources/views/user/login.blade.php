<x-layout>
    <form action="/login" method="post" style="width: 30%; margin: 0 auto;" class="my-5">
        @csrf
        <legend>Login Form:</legend>
        <input type="text" name="username"  value="{{ old('username') }}" placeholder="Enter username" class="form-control"><br>
        @error('username')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
       
        <input type="password" name="password" placeholder="Enter password" class="form-control"><br>
        @error('password')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input type="submit" name="submit" id="submit" class="btn btn-primary">
    </form>
</x-layout>