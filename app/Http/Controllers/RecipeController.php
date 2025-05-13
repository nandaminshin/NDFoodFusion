<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use TCPDF;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::with(['user', 'category']);

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        $recipes = $query->latest()->paginate(6);
        $categories = Category::all();

        return view('recipes', compact('recipes', 'categories'));
    }


    public function createNewRecipe()
    {
        $categories = Category::all();
        return view('createRecipe', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:30000'
        ]);

        $imagePath = $request->file('image')->store('recipes', 'public');

        $recipe = Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'image' => $imagePath
        ]);

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe created successfully!');
    }

    public function show(Recipe $recipe)
    {
        return view('recipeDetail', compact('recipe'));
    }

    public function downloadCard(Recipe $recipe)
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($recipe->user->full_name);
        $pdf->SetTitle($recipe->name . ' - Recipe Card');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(15, 15, 15);
        $pdf->AddPage();
        $imagePath = $recipe->image ? public_path('storage/' . $recipe->image) : public_path('images/homeDesign.jpg');

        if (file_exists($imagePath)) {
            $pdf->Image($imagePath, 15, 15, 180, 100, '', '', '', true, 150);
        }

        $pdf->SetFont('helvetica', 'B', 20);

        $pdf->Ln(110);
        $pdf->Cell(0, 10, $recipe->name, 0, 1, 'C');

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Ln(5);
        $pdf->Cell(0, 10, 'Category: ' . $recipe->category->name, 0, 1, 'L');
        $pdf->Cell(0, 10, 'By: ' . $recipe->user->full_name, 0, 1, 'L');

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Ln(5);
        $pdf->MultiCell(0, 10, $recipe->description, 0, 'L');

        return $pdf->Output($recipe->name . '_recipe_card.pdf', 'D');
    }

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('editRecipe', compact('recipe', 'categories'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30000'
        ]);

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::delete('public/' . $recipe->image);
            }
            $imagePath = $request->file('image')->store('recipes', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('recipes.detail', $recipe)
            ->with('success', 'Recipe updated successfully!');
    }

    public function destroy(Recipe $recipe)
    {
        if ($recipe->image) {
            Storage::delete('public/' . $recipe->image);
        }

        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully!');
    }
}