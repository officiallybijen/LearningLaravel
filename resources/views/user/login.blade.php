<x-layout>
    <form action="/login" method="post">
        @csrf
        <input type="text" name="username"  value="{{ old('username') }}" placeholder="enter username"><br>
        @error('username')
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