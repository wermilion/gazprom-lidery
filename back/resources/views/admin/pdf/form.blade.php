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

    .content {
        word-break: break-word;
    }

</style>

<div>
    <img id="logo" src="{{public_path('cp/images/gazprom-logo.svg')}}" alt="logo">
    <h1>{{$stage->name}}</h1>
</div>

<div class="content">
    <p>Табельный номер: {{ $user->tabel_number }}</p>
    <p>Имя: {{ $user->name }}</p>
    <p>Фамилия: {{ $user->surname }}</p>
    <p>Филиал: {{ $user->branch->name }}</p>
    <p>Должность: {{ $user->position }}</p>
    <p>Стаж: {{ $user->work_experience }}</p>
</div>

<div class="footer">
    <span class="pagenum"></span>
</div>

