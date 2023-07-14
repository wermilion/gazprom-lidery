<table class="table">
    <thead>
    <tr>
        <th>Табельный номер</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Филиал</th>
        <th>Должность</th>
        <th>Опыт работы</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->tabel_number }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->branch?->name }}</td>
            <td>{{ $user->position }}</td>
            <td>{{ $user->work_experience }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<style>
    .table {
        width: 100%;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }

    .table th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }

    .table td {
        border: 1px solid #dddddd;
        padding: 5px;
    }
</style>
