<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index', [
            'branches' => $branches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        $data = $request->all();

        Branch::create($data);

        return redirect()->route('cp.branches.index')->with(['success' => true, 'message' => 'Филиал успешно добавлен!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', [
            'branch' => $branch,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $data = $request->all();

        $branch->update($data);
        return redirect()->route('cp.branches.index')->with(['success' => true, 'message' => 'Название филиала успешно изменено!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        if (User::query()->where('branch_id', $branch->id)->exists()) {
            return redirect()->back()->with(['success' => true, 'message' => 'Филиал не может быть удалён, так как есть связанные с ним конкурсанты.']);
        }
        $branch->delete();
        return redirect()->back()->with(['success' => true, 'message' => 'Филиал удалён.']);
    }
}
