<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;
use App\Models\Student;
use App\Models\User;
use App\Services\LocationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        $municipalities = $this->locationService->getMunicipalities();
        $categories = ProgramCategory::all();

        return view('auth.register', compact('municipalities', 'categories'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Lengkap (Termasuk field orang tua & tribe)
        $request->validate([
            'name'                => 'required|string|max:60',
            'email'               => 'required|email|unique:users,email',
            'password'            => 'required|min:6',
            'sex'                 => 'required|in:m,f',
            'place_of_birth'      => 'required|string',
            'date_of_birth'       => 'required|date',
            'address'             => 'required|string',
            'municipality'        => 'required|string',
            'administrative_post' => 'required|string',
            'tribe'               => 'nullable|string', // Ditambahkan
            'village'             => 'required|string',
            'parent_name'         => 'nullable|string|max:100', // Ditambahkan
            'parent_phone'        => 'nullable|string|max:20',  // Ditambahkan
            'program_category_id' => 'required|exists:program_categories,id',
            'image'               => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            DB::beginTransaction();

            // 3. Simpan User
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // 4. Handle Image
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('students/photos', 'public');
            }

            // 5. Simpan Student
            Student::create([
                'student_id'          => $user->id, 
                'name'                => $request->name,
                'sex'                 => $request->sex,
                'date_of_birth'       => $request->date_of_birth,
                'place_of_birth'      => $request->place_of_birth,
                'address'             => $request->address,
                'municipality'        => $request->municipality,
                'administrative_post' => $request->administrative_post,
                'tribe'               => $request->tribe, 
                'village'             => $request->village,
                'image'               => $imagePath,
                'parent_name'         => $request->parent_name,
                'parent_phone'        => $request->parent_phone,
                'program_category_id' => $request->program_category_id,
                'enrollment_date'     => now(),
                'status'              => 'active',
                'is_active'           => true,
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'Rejistu susesu! Favor login ho ita-nia akun.');

        } catch (\Exception $e) {
            DB::rollBack();
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            return redirect()->back()
                             ->with('error', 'Iha problema: ' . $e->getMessage())
                             ->withInput();
        }
    }

    // API Methods untuk Dropdown Dinamis
    public function getPosts($municipality)
    {
        return response()->json($this->locationService->getAdministrativePosts($municipality));
    }

    public function getTribes($municipality, $post)
    {
        return response()->json($this->locationService->getTribes($municipality, $post));
    }

    public function getVillages($municipality, $post, $tribe)
    {
        return response()->json($this->locationService->getVillages($municipality, $post, $tribe));
    }
}