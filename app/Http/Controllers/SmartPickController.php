<?php
namespace App\Http\Controllers;
use App\Models\SmartPick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmartPickController extends Controller
{
    public function index()
    {
        $smartPicks = SmartPick::all();
        return view('admin.smart_picks.index', compact('smartPicks'));
    }

    public function create()
    {
        return view('admin.smart_picks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'category' => 'required|string',
            'affiliate_link' => 'required|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        SmartPick::create($validated);
        return redirect()->route('smart_picks.index')->with('success', 'Smart Pick created successfully');
    }

    public function edit(SmartPick $smartPick)
    {
        return view('admin.smart_picks.edit', compact('smartPick'));
    }

    public function update(Request $request, SmartPick $smartPick)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'category' => 'required|string',
            'affiliate_link' => 'required|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($smartPick->image) {
                Storage::disk('public')->delete($smartPick->image);
            }
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        $smartPick->update($validated);
        return redirect()->route('smart_picks.index')->with('success', 'Smart Pick updated successfully');
    }

    public function destroy(SmartPick $smartPick)
    {
        if ($smartPick->image) {
            Storage::disk('public')->delete($smartPick->image);
        }
        $smartPick->delete();
        return redirect()->route('smart_picks.index')->with('success', 'Smart Pick deleted successfully');
    }
}