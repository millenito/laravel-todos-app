<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos; // pake model todos yang berisikan table 'todos', ada di 'App/Todos'
use DB; // Cara 'Facade' menggunakan namespace 'DB' yang bisa langsung query ke table yang disebutkan

class TodosController extends Controller
{
	/**
	 * query semua dari table todos, assign view untuk dipakai blade di view
	 */
	public function index(){
		// Select * from todos;

		// $todos_all = DB::table('todos')->get(); // query menggunakan namespace DB
		$todos_all = Todos::all(); // query menggunakan model Todos hanyak untuk table 'todos'

		return view('todos/index')->with('todos', $todos_all); // assign variable ke view blade.php
	}

	/**
	* menerima parameter id todo dari routing uri untuk menampilkan 
	* page todo yang sesuai dengan id
	*/
	public function show($todoId){
		// select * from todos where id = $todoid;

		// ::find untuk menselect menggunakan where primary key (default nya kolom 'id')
		$todo = DB::table('todos')->find($todoId); // menggunakan namespace DB
		// $todo = Todos::find($todoid); // menggunakan model Todos

		return view('todos/show')->with('todo',$todo);
	}

	/**
	* Assign view untuk membuat todos baru
	*/
	public function new() {
		return view('todos/new');
	}

	/**
	 * Assign view untuk edit todo
	 */
	public function edit($todoId) {
		$todo = Todos::find($todoId);

		return view('todos/edit')->with('todo', $todo);
	}

	/**
	* Insert todo baru ke database
	*/
	public function insert(Request $request) {
		// Validasi terhadap request
		$request->validate([
			'name' => 'required|min:6|max:20',
			'description' => 'required',
		]);

		// Ambil post lemparan dari form di view
		$data = $request->input(); // $this->input->post();

		// Buat instansiasi baru dari model todos yg berisikan table todos
		$new_todo = new Todos();

		// insert kolom-kolom table todos
		$new_todo->name        = $data['name'];
		$new_todo->description = $data['description'];
		$new_todo->completed   = false;

		// commit
		$new_todo->save();

		// redirect ke index melalui routing, sambil melakukan flash session untuk memberi pesan yg akan ditangkep di view
		return redirect('/')->with('success', [
			'status'  => 'insert',
			'message' => 'Succesfully added new todo'
		]);
	}
	
	/**
	* Update todo dari database
	* params: todo id dari uri, request dari inputan
	*/
	public function update($todoId, Request $request) {
		$request->validate([
			'name' => 'required|min:6|max:20',
			'description' => 'required',
		]);

		$data = $request->all(); // sama dengan $request->input()

		$todo = Todos::find($todoId); // Cari todo berdasarkan id untuk di update

		// Update todo dengan data baru
		$todo->name        = $data['name'];
		$todo->description = $data['description'];

		$todo->save(); // commit

		// redirect sambil flash session
		return redirect('/')->with('success', [
			'status'  => 'update',
			'message' => 'Succesfully updated todo'
		]);
	}
	
	/**
	 * Delete todo dari database
	 */
	public function delete($todoId) {
		$todo = Todos::find($todoId);

		// delete from todos where id = $todoid
		$todo->delete();

		// flash session terpisah dengan redirect
		session()->flash('success', [
			'status'  => 'delete',
			'message' => 'Succesfully deleted',
		]);

		return redirect('/');
	}

	/**
	* Set todo jadi complete
	*/
	public function complete($todoId) {
		$todo = Todos::find($todoId);

		$todo->completed = true;

		$todo->save();

		return redirect('/')->with('success', [
			'status'  => 'complete',
			'message' => 'Succesfully updated todo'
		]);
	}
	
}
