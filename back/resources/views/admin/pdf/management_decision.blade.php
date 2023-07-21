<style>
    body {
        margin: 0;
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
    }

    #logo {
        width: 100px;
        height: 50px;
    }

    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
        bottom: 0;
    }

    .pagenum:before {
        content: counter(page);
    }

    .header {
        display: flex;
        flex-direction: row;
    }

</style>
<div class="header">
    <img id="logo" src="{{public_path('/images/gazprom-logo.svg')}}" alt="logo">
    <h1>{{$stage->name}}</h1>
</div>
<p>Табельный номер: {{ $user->tabel_number }}</p>
<p>Проблема: {{ $management->problem }}</p>
<p>Управленческая задача: {{ $management->management_task }}</p>
<p>Решение: {{ $management->solution }}</p>
<p>Результат: {{ $management->result }}</p>
<p>Вывод: {{ $management->conclusion }}</p>
<p>Доп. файлы: {{$management->check_file ? 'Да' : 'Нет'}}</p>
<div class="footer">
    <span class="pagenum"></span>
</div>

