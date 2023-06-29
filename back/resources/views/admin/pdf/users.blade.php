<style>
    body {
        margin: 0;
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
    }

    table {
        margin-top: 10px;
        border-collapse: collapse;
    }

    .col {
        text-align: left;
    }

    th, td {
        border: 1px solid black;
        padding: 5px;
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

    .page-break {
        page-break-before: always;
    }

    .pagenum:before {
        content: counter(page);
    }

</style>
<img id="logo" src="{{URL('/images/gazprom-logo.svg')}}" alt="logo">

<table>
    <tr>
        <th class="col">#</th>
        <th class="col">Табельный номер</th>
        <th class="col">Имя</th>
        <th class="col">Фамилия</th>
        <th class="col">Филиал</th>
        <th class="col">Должность</th>
        <th class="col">Опыт работы</th>
    </tr>
    @foreach($users as $index => $user)
        <tr class="@if(($index + 1) % 20 == 0) page-break @endif">
            <td>{{$index + 1}}</td>
            <td>{{ $user->tabel_number }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->branch?->name }}</td>
            <td>{{ $user->position }}</td>
            <td>{{ $user->work_experience }}</td>
        </tr>

    @endforeach
</table>

<div class="footer">
    <span class="pagenum"></span>
</div>
