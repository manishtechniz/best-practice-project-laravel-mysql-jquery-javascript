<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function update()
    { 
        Validator::make([
            'permission' => request('permission') ?? [],
        ], [
            'permission' => 'nullable|array',
        ])->validate();

        auth()->user()->syncPermissions(request('permission', []));

        return redirect()->back()->with('success', 'Permission updated successfully.');
    }
}
