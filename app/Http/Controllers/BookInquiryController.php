<?php
namespace App\Http\Controllers;

use App\Models\BookInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookInquiryController extends Controller
{
    public function inquiry()
    {
        return view('books.inquiry');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:6|alpha_num',
            'phone' => 'required|digits:8',
            'email' => 'required|email',
            'item_name' => 'required|min:10',
            'pickup_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token'); // Exclude the _token field from the data

        BookInquiry::create($data);

        return redirect()->route('inquiry')->with('success', 'Book inquiry submitted successfully.');
    }
}