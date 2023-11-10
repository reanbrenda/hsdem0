

<x-site-layout title="ADMIN ZONE - CATEGORIES">

    <form action="{{route('admin.categories.store')}}" method="post">

        @csrf

        <input type="text" name="name" placeholder="Category Name">

        <button type="submit">Create</button>
    </form>

</x-site-layout>
