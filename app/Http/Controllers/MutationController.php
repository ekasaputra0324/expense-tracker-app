<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\Mutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MutationController extends Controller
{
    public function index()
    {

        $mutations =  DB::table('mutations')
            ->join('categoris', 'mutations.categori_id', '=', 'categoris.id')->join('users', 'mutations.user_id', '=', 'users.id')
            ->select('mutations.id', 'mutations.amount', 'mutations.description', 'mutations.date', 'mutations.status', 'categoris.name')->get();

        return view('mutation.index', [
            "categories" => Categori::all(),
            "data" => $mutations
        ]);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     "categori_id" => "required",
        //     "date" => "required",
        //     "amount" => "required",
        //     "user_id" => "required",
        //     "description" => "required",
        //     "status" => "required"
        // ]);

        $mutations = new Mutation();
        $mutations->user_id = $request->user_id;
        $mutations->categori_id = $request->categori_id;
        $mutations->amount = $request->amount;
        $mutations->description = $request->description;
        $mutations->status = $request->status;
        $mutations->date = $request->date;
        if ($mutations->save()) {
            Alert::toast('mutation successfully added', 'success');
            return redirect('/mutation');
        }
    }
    public function drop($id)
    {

        $mutations = Mutation::where('id', $id);
        $mutations->delete();
        Alert::toast('mutation successfully deleted', 'success');
        return redirect('/mutation');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            "categori_id" => "required",
            "date" => "required",
            "amount" => "required",
            "user_id" => "required",
            "description" => "required",
            "status" => "required"
        ]);

        $mutations = Mutation::where('id', $id);
        $data =   $mutations->update([
            "user_id" => $request->user_id,
            "categori_id" => $request->categori_id,
            "amount" => $request->amount,
            "status" => $request->status,
            "description" => $request->description,
            "date" => $request->date,
        ]);
        if ($data > 0) {
            Alert::toast('mutation successfully Changes', 'success');
            return redirect('/mutation');
        }else{
            Alert::toast('mutation successfully Changes', 'error');
            return redirect('/mutation');
        }


        Alert::toast('mutation failed Changes', 'error');
        return redirect('/mutation');
    }

    public function getdataByid($id)
    {

        $mutations = Mutation::where('id', $id)->get();
        echo json_encode($mutations);
    }
}
