<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Good;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['borrower', 'good'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $borrowers = User::all();
        $goods = Good::where('status', 'Available')->get();
        return view('loans.create', compact('borrowers', 'goods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'borrower_id' => 'required|exists:users,id',
            'good_id'     => 'required|exists:goods,id',
            'borrow_date' => 'required|date',
        ]);

        // Create loan record, default status 'Borrowed'
        $loan = Loan::create([
            'borrower_id' => $data['borrower_id'],
            'good_id'     => $data['good_id'],
            'borrow_date' => $data['borrow_date'],
            'loan_status' => 'Borrowed'
        ]);

        // Update the Good status to Borrowed and reduce available stock if needed
        $good = Good::find($data['good_id']);
        $good->update([
            'status' => 'Borrowed',
            'stock'  => $good->stock - 1
        ]);

        return redirect()->route('loans.index')->with('success', 'Loan record created successfully');
    }

    public function show(Loan $loan)
    {
        $loan->load(['borrower', 'good']);
        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        $borrowers = User::all();
        $goods = Good::all();
        return view('loans.edit', compact('loan', 'borrowers', 'goods'));
    }

    public function update(Request $request, Loan $loan)
    {
        $data = $request->validate([
            'return_date' => 'nullable|date',
            'loan_status' => 'required|in:Borrowed,Returned'
        ]);

        $loan->update($data);

        // If marking as Returned, increment the good stock and update status if needed
        if ($data['loan_status'] === 'Returned') {
            $good = Good::find($loan->good_id);
            $good->update([
                'stock'  => $good->stock + 1,
                'status' => 'Available'
            ]);
        }

        return redirect()->route('loans.index')->with('success', 'Loan record updated successfully');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan record deleted successfully');
    }
}
