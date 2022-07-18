<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function image()
    {
        return view('image');
    }

    public function store(Request $request) {
		$file = $request->file('image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$imageData = ['status' => $request->status, 'image' => $fileName];
		Image::create($imageData);
		return response()->json([
			'success' => 200,
		]);
	}

    public function fetchData()
    {
        $items = Image::all();
		$output = '';
		if ($items->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($items as $item) {
				$output .= '<tr>
                <td>' . $item->id . '</td>
                <td><img src="storage/public/images/' . $item->image . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $item->status .'</td>
                <td>
                <a href="#" id="' . $item->id . '" class="text-success mx-1 btn-edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">edit</a>

                <a href="#" id="' . $item->id . '" class="text-danger mx-1 btn-delete">delete</a>
                </td>
            </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
    }

    public function edit(Request $request) {
		$image_id = $request->id;
		$emp = Image::find($image_id);
		return response()->json($emp);
	}

    public function update(Request $request) {
		$fileName = '';
		$emp = Image::find($request->image_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emp->image) {
				Storage::delete('public/images/' . $emp->image);
			}
		} else {
			$fileName = $request->emp_image;
		}

		$imageData = [ 'status' => $request->status, 'image' => $fileName];

		$emp->update($imageData);
		return response()->json([
			'status' => 200,
		]);
	}

	// // handle delete an imageloyee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Image::find($id);
		if (Storage::delete('public/images/' . $emp->image)) {
			Image::destroy($id);
		}
	}
}
