<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * عرض جميع الشروط والسياسات
     */
    public function getAllPolicies()
    {
        $policies = Policy::active()->get();

        return response()->json([
            'success' => true,
            'data' => $policies,
            'message' => 'تم جلب الشروط والسياسات بنجاح'
        ]);
    }

    /**
     * عرض سياسة محددة حسب النوع
     */
    public function getPolicyByType($type)
    {
        $policy = Policy::active()->byType($type)->first();

        if (!$policy) {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم العثور على السياسة المطلوبة'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $policy,
            'message' => 'تم جلب السياسة بنجاح'
        ]);
    }
} 