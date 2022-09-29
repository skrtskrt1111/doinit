@extends('layouts.app')

@section('content')
<body>
    <div class="container ">



        <div class="row justify-content-center meblock">





        <h1 class="text-center mt-3">Задачи




         <div class="flex-auto text-right mt-2">
                        <a href="/task" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded" style="float: right;">Новая задача</a>
                    </div></h1>
<table class="w-full text-md rounded mb-4 ">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Задача</th>
                        <th class="text-left p-3 px-5">Пользователь</th>
                        <th class="text-left p-3 px-5">Категория</th>
                        <th class="text-left p-3 px-5">Действие</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="tasks-block flex col">
                    @foreach($tasks as $task)

                        <tr class="task-item border-b hover:bg-orange-100">

                            <td class="p-3 px-5" style="font-size:30px; word-break: break-all;">

                                {{$task->description}}


                            </td>
                            <td class="p-3 px-5">

                                user id
                                {{$task->user_id}}




                            </td>
                            <td class="p-3 px-5">

                                {{$task->category['name']}}


                            </td>


                            <td class="p-3 px-5">

                                <a href="/task/{{$task->id}}" name="edit" class="mr-3 bg-blue-500 hover:bg-blue-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Изменить</a>
                                <form action="/task/{{$task->id}}" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Удалить</button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>


                    @endforeach
                     {{$tasks->withQueryString()->links('vendor.pagination.bootstrap-4')}}
</div>

                    </tbody>
                </table>
         <form action="{{route('home')}}" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Поиск</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="напиши текст для поиска">
            </div>

            <button type="submit" class="btn btn-dark">Искать</button>
        </form>

 <form action="{{route('home')}}" method="get">
 <div class="mb-3">
                <div class="form-label">Выбери сортировку по статусу</div>
                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id) selected @endif @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Подтвердить</button>
        </form>

                </div>







    </div>
    <script src="/js/app.js"></script>
</body>
</html>

@endsection


