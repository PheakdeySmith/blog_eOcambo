<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use id;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $authors = Author::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
            ->paginate(10);

        return view('backend.pages.authors.index', compact('authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $author = Author::findOrFail($id);
        $authorData = $request->only(['name', 'status']);

        if ($request->hasFile('image')) {
            if ($author->user && $author->user->image && file_exists(public_path('storage/' . $author->user->image))) {
                unlink(public_path('storage/' . $author->user->image));
            }

            $newImagePath = $request->file('image')->store('profile_images', 'public');
            $authorData['image'] = $newImagePath;
        }

        $author->update($authorData);

        if ($author->user) {
            $author->user->update([
                'status' => $request->status,
                'image' => $authorData['image'] ?? $author->user->image,
            ]);
        }

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }


    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        if ($author->user) {
            if ($author->user->image && file_exists(public_path('storage/' . $author->user->image))) {
                unlink(public_path('storage/' . $author->user->image));
            }

            $author->user->delete();
        }

        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author and associated user deleted successfully.');
    }

}
