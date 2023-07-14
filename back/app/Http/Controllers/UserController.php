<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Http\Filters\UserFilter;
use App\Http\Requests\CreateUserRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserController extends Controller
{
    /**
     * Вывод списка конкурсантов
     */
    public function index(UserFilter $filter)
    {
        $users = User::orderBy('id', 'DESC')->where('role_id', 1)->where('custom_password', true)->filter($filter)->paginate(10);

        $branches = Branch::all();

        return view('admin.users.index', [
            'users' => $users,
            'branches' => $branches
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function export()
    {
        $tabelNumber = request()->get('tabel_number');
        $branchId = request()->get('branch_id');
        $userBuilder = User::query()->where('role_id', 1)->where('custom_password', true);
        if ($tabelNumber) $userBuilder->where('tabel_number', $tabelNumber);
        if ($branchId) $userBuilder->where('branch_id', $branchId);

        $users = $userBuilder->get();

        return Excel::download(new UserExport($users), 'Конкурсанты.xlsx');
    }

    /**
     * Форма для добавления пользователя
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Запись нового пользователя в БД
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'tabel_number' => $request->tabel_number,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('cp.users.index')->with(['success' => true, 'message' => 'Конкурсант с табельным номером ' . $user->tabel_number . ' был успешно создан']);
    }

    /**
     * Удаление пользователя в БД
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('cp.users.index')->with(['success' => true, 'message' => 'Конкурсант был удалён.']);
    }
}
