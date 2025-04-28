@extends('layouts.admin')
@section('content')

CREATE CATEGORY


@endsection






















{{-- <!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اضافة تصنيف جديد</title>
</head>
<body>
    <h1>اضافة تصنيف جديد</h1>
    <table dir="rtl">
        <form action="{{route('admin.categories.store')}}" method="post">
        @csrf
        <tr><input type="file" name="picture" id="picture"></tr>
        <tr>
            <td>اسم التصنيف</td>
            <td><input type="text" name="name" id=""></td>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </tr>
        <tr>
            <td>الحالة</td>
            <td><input type="text" name="active" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="أضف"></td>
        </tr>
        
    </form>
    </table>
</body>
</html> --}}