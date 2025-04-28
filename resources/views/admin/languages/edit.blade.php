<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Languages</h1>
    <table dir="rtl">
        <form action="{{route('admin.languages.update',$language->id)}}" method="post">
        @csrf
        <tr>
            <td>اسم اللغة</td>
            <td><input type="text" name="name" value="{{$language->name}}"></td>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </tr>
        <tr>
            <td>الاختصار</td>
            <td><input type="text" name="abbr" value="{{$language->abbr}}"></td>
        </tr>
        <tr>
            <td>الاتجاه</td>
            <td><input type="text" name="direction" value="{{$language->direction}}"></td>
        </tr>
        <tr>
            <td>الحالة</td>
            <td><input type="text" name="active" value="{{$language->active}}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="تعديل"></td>
        </tr>
        
    </form>
    </table>
</body>
</html>