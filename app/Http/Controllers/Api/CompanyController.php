<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * عرض جميع الشركات
     */
    public function getAllCompanies()
    {
        $companies = Company::active()->get();

        return response()->json([
            'success' => true,
            'data' => $companies,
            'message' => 'تم جلب الشركات بنجاح'
        ]);
    }
} 