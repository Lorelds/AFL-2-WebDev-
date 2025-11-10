<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::oldest()->with('reviews')->get();
        $reviews = Review::latest()->with('user', 'product')->get();

        return view('adminPage', [
            'products' => $products,
            'reviews' => $reviews,
            'pagetitle' => 'Admin Page'
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar jika ada
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update', compact('product'));
    }

    // ======== Fungsi UPDATE Produk ========
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = 'storage/' . $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    // ======== 🆕 Tambah Produk Baru ========
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = 'storage/' . $imagePath;
        }

        $product->save();

        return redirect()->route('homepage.index')->with('success', 'Produk baru berhasil ditambahkan!');
    }
}
