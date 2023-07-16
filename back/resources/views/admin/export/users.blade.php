<table>
    <thead>
    <tr>
        <th style="font-weight: bold; text-align: center;">Табельный номер</th>
        <th style="font-weight: bold; text-align: center;">Имя</th>
        <th style="font-weight: bold; text-align: center;">Фамилия</th>
        <th style="font-weight: bold; text-align: center;">Филиал</th>
        <th style="font-weight: bold; text-align: center;">Должность</th>
        <th style="font-weight: bold; text-align: center;">Опыт работы</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td style="text-align: left">{{ $user->tabel_number }}</td>
            <td style="text-align: left">{{ $user->name }}</td>
            <td style="text-align: left">{{ $user->surname }}</td>
            <td style="text-align: left">{{ $user->branch?->name }}</td>
            <td style="text-align: left">{{ $user->position }}</td>
            <td style="text-align: left">{{ $user->work_experience }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
