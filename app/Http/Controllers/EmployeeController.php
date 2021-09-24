<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;

class EmployeeController extends Controller

{
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);

    }

    public function create()
    {
        /// menampilkan halaman create
        return view('employees.create');
    }

    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'nip' => 'required',
        ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Employee::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('employees.show',$employee->id) }}
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('employees.edit',$employee->id) }}
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'nip' => 'required',

        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $employee->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }

    // public function export()
    // {
    //     return Excel::download(new EmployeesExport, 'users.xlsx');

    // }

    public function import(Request $request)
    {
        Excel::import(new EmployeesImport(), $request->file('import_file'));
        // dd($request);


        return redirect()->route('employees.index');
    }
}
