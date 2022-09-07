<x-layout>
    <form action="/register" method="post" style="max-width: 40%; margin: 0 auto;" class="my-5">
        @csrf
        <legend>Register Form:</legend>
        <input class="form-control" type="text" name="name"  value="{{ old('name') }}" placeholder="Enter name"><br>
        @error('name')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input class="form-control" type="text" name="username"  value="{{ old('username') }}" placeholder="Enter username"><br>
        @error('username')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input class="form-control" type="email" name="email"  value="{{ old('email') }}" placeholder="Enter email"><br>
        @error('email')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input class="form-control" type="password" name="password" placeholder="Enter password"><br>
        @error('password')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input class="btn btn-primary" type="submit" name="submit" id="submit">
       
    </form>
</x-layout>