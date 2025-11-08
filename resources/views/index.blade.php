<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ToDoアプリ</title>
    <link rel="stylesheet" href="{{ url('style.css') }}">
</head>

<body>
    <main>
        <div class="container">
            <h1>ToDoリスト</h1>

            <!-- 新規登録フォーム -->
            <form action="{{ route('tasks.store') }}" method="POST" class="add-task">
                @csrf
                <input type="text" name="title" placeholder="タスクを入力">
                <button type="submit">追加</button>
            </form>

            <!-- タスク一覧 -->
            <ul>
                @foreach ($tasks as $task)
                    <li class="task-item">
                        <form action="{{ route('tasks.toggle', $task)}}" method="POST">
                            @csrf
                            <button class="task-title">{{ $task->title }}</button>
                        </form>

                        <form action="{{ route('tasks.destroy', $task)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="delete">削除</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
</body>

</html>



<!-- JavaScript: Delete confirmation in English -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('form.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to delete this task?')) {
                    e.preventDefault(); // Cancel submission
                }
            });
        });
    });
</script>
