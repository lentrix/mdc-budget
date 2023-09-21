<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Models\Item;
use App\Models\ProcurementPlan;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index() {
        $user = auth()->user();

        $budgets = $user->budgets;

        $summaries = [];

        foreach($budgets as $budget) {
            $summaries[] = [
                'capex' => [
                    'summary'=>$budget->summaryStatement('capex'),
                    'total'=>$budget->categoryTotal('capex')
                ],
                'opex' => [
                    'summary'=>$budget->summaryStatement('opex'),
                    'total'=>$budget->categoryTotal('opex')
                ]
            ];
        }

        return inertia('Budgets/Index',[
            'budgets'=>$budgets,
            'summaries'=>$summaries,
            'total' => $budget->categoryTotal('opex') + $budget->categoryTotal('capex')
        ]);
    }

    public function manage(Budget $budget) {
        $budget->load('department');
        $opex = BudgetItem::where('budget_id', $budget->id)
                ->whereHas('item', function($q1){
                    $q1->whereHas('category', function($q2){
                        $q2->where('type','opex');
                    });
                })->with('item')->get();

        $capex = BudgetItem::where('budget_id', $budget->id)
                ->whereHas('item', function($q1){
                    $q1->whereHas('category', function($q2){
                        $q2->where('type','capex');
                    });
                })->with('item')->get();

        $capexTotal = $budget->categoryTotal('capex');
        $opexTotal = $budget->categoryTotal('opex');
        $total = $capexTotal + $opexTotal;

        return inertia('Budgets/Manage',[
            'budget'=>$budget,
            'opex' => $opex,
            'capex' => $capex,
            'capexTotal' => number_format($capexTotal, 2,'.',','),
            'opexTotal' => number_format($opexTotal, 2,'.',','),
            'total' => number_format($total, 2, '.',',')
        ]);
    }

    public function addItem(Request $request, Budget $budget) {
        $request->validate([
            'item_id' => 'integer|required',
            'price' => 'numeric|required',
            'qty'=>'integer|required'
        ]);

        $item = Item::find($request->item_id);

        BudgetItem::create([
            'budget_id' => $budget->id,
            'item_id' => $item->id,
            'qty' => $request->qty,
            'custom_price' => $request->price == $item->regular_price ? $item->regular_price: $request->price,
            'remarks' => $request->remarks
        ]);

        return back();
    }

    public function deleteItem(Request $request) {
        $budgetItem = BudgetItem::findOrFail($request->budget_item_id);
        $budgetItem->delete();
        return back()->with('Info','A budget item has been deleted.');
    }

    public function approve(Budget $budget) {
        $budget->status = 'approved';
        $budget->approved_at = now();
        $budget->approved_by = auth()->user()->id;
        $budget->save();

        return back()->with('Info','This budget has been approved.');
    }

    public function retractApproval(Budget $budget) {
        $budget->status = "pending";
        $budget->approved_by = null;
        $budget->approved_at = null;
        $budget->save();

        return back()->with('Info','The approval of this budget has been retracted.');
    }
}
