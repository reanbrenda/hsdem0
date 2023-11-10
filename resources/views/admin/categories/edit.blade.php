

<x-site-layout title="ADMIN ZONE - CATEGORIES - EDIT">

    <form action="{{route('admin.categories.update', $category->id)}}" method="post">

        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{$category->name}}" placeholder="Category Name">

        <button type="submit">Update</button>
    </form>

</x-site-layout>
