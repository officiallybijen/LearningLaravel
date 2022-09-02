<x-layout>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" placeholder="enter name">
        <input type="text" name="username" placeholder="enter username">
        <input type="email" name="email" placeholder="enter email">
        <input type="password" name="password" placeholder="enter password">
        <input type="submit" name="submit" id="submit">
    </form>
</x-layout>