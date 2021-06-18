<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function insert(Request $request){
        $request->validate([
            'categoryName' => 'required'
        ]);

        $category = new Category;

        $category->name = $request->categoryName;

        $category->save();

        return redirect()->back();
    }

    public function delete($id){
        Category::destroy($id);

        return redirect()->back();
    }
}
