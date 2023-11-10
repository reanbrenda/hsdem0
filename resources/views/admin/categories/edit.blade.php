

<x-site-layout title="ADMIN ZONE - CATEGORIES - EDIT">


    <form action="{{route('admin.categories.update', $category->id)}}" method="post">

        @csrf
        @method('PUT')

        <x-crud-input-field name="name" label="Category name" value="{{$category->name}}" placeholder="..."/>

        <button type="submit">Update</button>
    </form>

</x-site-layout>
