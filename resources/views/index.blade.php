<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App || DAH</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div
        class="min-h-screen w-screen bg-gradient-to-bl from-violet-300 to-sky-300 flex flex-col gap-2 items-center justify-center p-5">
        <h1 class="text-xl text-white font-bold">Laravel Todo App</h1>

        <div class="max-w-xl w-full bg-white p-5 rounded-md shadow-lg">

            @if (!isset($EditTodo))
                <form action="/store" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
                    {{ csrf_field() }}
                    <div class="col-span-9">
                        <input type="text" name="task"
                            class="w-full p-2 border focus:outline-none focus:border-blue-200 focus:shadow-lg">
                    </div>
                    <div class="col-span-3">
                        <input type="submit" name="submit" value="Add Task"
                            class="w-full py-2 bg-blue-400 text-white rounded-md font-medium hover:bg-sky-500 hover:cursor-pointer hover:font-semibold">
                    </div>
                </form>
            @endif

            @if (isset($EditTodo))
                <form action="/update/{{ $EditTodo->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-span-9">
                        <input type="text" name="task"
                            class="w-full p-2 border focus:outline-none focus:border-blue-200 focus:shadow-lg"
                            value="{{ $EditTodo->task }}">
                    </div>
                    <div class="col-span-3">
                        <input type="submit" name="submit" value="Update Task"
                            class="w-full py-2 bg-blue-400 text-white rounded-md font-medium hover:bg-sky-500 hover:cursor-pointer hover:font-semibold">
                    </div>
                </form>
            @endif

        </div>

        <h1 class="text-lg text-black font-bold">Pending List</h1>

        <div class="max-w-xl w-full bg-white pg-5 rounded-md shadow-lg">
            <table class="w-full table-auto border-collapse border-slate-950 hover:border-blue-900">
                <thead>
                    <tr class="bg-blue-100">
                        <th class="p-2 boder border-slate-300">#</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @foreach ($Pendings as $Pending)
                        <tr>
                            <td>{{ $Pending->id }}</td>
                            <td>{{ $Pending->task }}</td>
                            <td class="flex justify-center">
                                <form action="/done/{{ $Pending->id }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" name="submit" value="Mark as done">
                                </form>
                                <form action="/edit/{{ $Pending->id }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" name="submit" value="Edit">
                                </form>
                                <form action="/destroy/{{ $Pending->id }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" name="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>



        <h1 class="text-lg text-black font-bold">Completed List</h1>



        <div class="max-w-xl w-full bg-white pg-5 rounded-md shadow-lg">
            <table class="w-full table-auto border-collapse border-slate-950 hover:border-blue-900">
                <thead>
                    <tr class="bg-blue-100">
                        <th class="p-2 boder border-slate-300">#</th>
                        <th>Description</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($Completeds as $Completed)
                <tr>
                    <td>{{ $Completed->id }}</td>
                    <td>{{ $Completed->task }}</td>
                    <td class="flex justify-center">
                        <form action="/undo/{{ $Completed->id }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" name="submit" value="Undo">
                        </form>
                        <form action="/edit/{{ $Completed->id }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" name="submit" value="Edit">
                        </form>
                        <form action="/destroy/{{ $Completed->id }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" name="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>

</div>
</body>

</html>
