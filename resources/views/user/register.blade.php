<x-layout>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name"  value="{{ old('name') }}" placeholder="enter name"><br>
        @error('name')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input type="text" name="username"  value="{{ old('username') }}" placeholder="enter username"><br>
        @error('username')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input type="email" name="email"  value="{{ old('email') }}" placeholder="enter email"><br>
        @error('email')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input type="password" name="password" placeholder="enter password"><br>
        @error('password')
        <p style="color:red;">
            {{ $message }}
        </p>    
    @enderror
        <input type="submit" name="submit" id="submit">
       
    </form>
</x-layout>