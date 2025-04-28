<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لغات الموقع</title>
</head>
<body>
    <h1>لغات الموقع</h1>
    <a href="{{route('admin.languages.create')}}">اضافة لغة</a>
    <table border="1" dir="rtl">
        <tr>
        <th>اللغة</th>
        <th>الاختصار</th>
        <th>الاتجاه</th>
        <th>الحالة</th>
        <th>تعديل/احذف</th>
    </tr>
    @isset($languages)
    @foreach ($languages as $item)   
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->abbr}}</td>
        <td>{{$item->direction}}</td>
        <td>{{$item->active}}</td>
        <td><a href="{{route('admin.languages.edit',$item->id)}}">تعديل</a>/<a href="{{route('admin.languages.delete',$item->id)}}">حذف</a></td>
    </tr>
    @endforeach            
    @endisset
    </table>
</body>
</html>