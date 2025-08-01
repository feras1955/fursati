<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * عرض جميع الأسئلة الشائعة
     */
    public function getAllFAQs()
    {
        $faqs = Faq::active()->ordered()->get();

        return response()->json([
            'success' => true,
            'data' => $faqs,
            'message' => 'تم جلب الأسئلة الشائعة بنجاح'
        ]);
    }
} 