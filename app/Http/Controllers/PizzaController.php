<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    public function searchPizza(Request $request) {
        $data = $request->all();

        $pizzas = DB::table('pizzas')
            ->select();

        if($data['search'] !== null) {
            $pizzas = $pizzas
                ->where('name','like','%'.$data['search'].'%');
        }

        if($pizzas->count() == 0) {
            $messages = 'no pizza found!';
        } else {
            $messages = [];
        }

        return view('home-page', [
            'pizzas' => $pizzas->get(),
            'error_message' => $messages
        ]);
    }

    public function deletePizza($deleteId) {
        $pizza = Pizza::findOrFail($deleteId);
        $name = $pizza->name;
        $pizza->delete();

        $messages =$name.' successfully deleted!';

        return redirect()->route('pizza.home-page')->with(['messages'=>$messages]);
    }

    public function getHomePage($messages = []) {
        $pizzas = DB::table('pizzas')
            ->select()
            ->get();

        return view('home-page', [
            'pizzas' => $pizzas,
            'messages' => $messages
        ]);
    }

    public function addPizzaPage($messages = []) {
        return view('add-new-pizza', [
            'messages' => $messages
        ]);
    }

    public function addPizza(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|min:20',
            'price' => 'required|min:10000|numeric',
            'file' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg'
        ]);

        try {
            $data = $request->all();

            if($request->hasFile('file')) {
                $detination_path = 'public/images';
                $image = $request->file('file');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('file')->storeAs($detination_path, $image_name);
            }

            $pizza = new Pizza();
            $pizza->name = $data['name'];
            $pizza->description = $data['description'];
            $pizza->price = $data['price'];
            $pizza->photo = $image_name;
            $pizza->save();

        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();

        $messages = $data['name'].' successfully added!';

        return $this->addPizzaPage($messages);
    }
}
