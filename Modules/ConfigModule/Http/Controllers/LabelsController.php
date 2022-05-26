<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class LabelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:labels');
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $insuranceArFilePath = 'Modules/WarrantyModule/Resources/lang/ar/insurance.php';
        $insuranceEnFilePath = 'Modules/WarrantyModule/Resources/lang/en/insurance.php';
        $insurance_lang_ar = include base_path($insuranceArFilePath);

        $insurance_file_ar = addslashes(base_path($insuranceArFilePath));
        $insurance_lang_en = include base_path($insuranceEnFilePath);
        $insurance_file_en = addslashes(base_path($insuranceEnFilePath));

        $warrantyArFilePath = 'Modules/WarrantyModule/Resources/lang/ar/warranty.php';
        $warrantyEnFilePath = 'Modules/WarrantyModule/Resources/lang/en/warranty.php';
        $warranty_lang_ar = include base_path($warrantyArFilePath);
        $warranty_file_ar = addslashes(base_path($warrantyArFilePath));
        $warranty_lang_en = include base_path($warrantyEnFilePath);
        $warranty_file_en = addslashes(base_path($warrantyEnFilePath));

        $smsWarrantyArFilePath = 'Modules/WarrantyModule/Resources/lang/ar/sms_warranty.php';
        $smsWarrantyEnFilePath = 'Modules/WarrantyModule/Resources/lang/en/sms_warranty.php';
        $smsWarranty_lang_ar = include base_path($smsWarrantyArFilePath);
        $smsWarranty_file_ar = addslashes(base_path($smsWarrantyArFilePath));
        $smsWarranty_lang_en = include base_path($smsWarrantyEnFilePath);
        $smsWarranty_file_en = addslashes(base_path($smsWarrantyEnFilePath));

        $front_lang_ar = include base_path('Modules/CommonModule/Resources/lang/ar/front.php');
        $front_lang_en = include base_path('Modules/CommonModule/Resources/lang/en/front.php');
        $front_file_ar = addslashes(base_path('Modules/CommonModule/Resources/lang/ar/front.php'));
        $front_file_en = addslashes(base_path('Modules/CommonModule/Resources/lang/en/front.php'));

        return view('configmodule::admin.labels.index', compact('front_lang_ar', 'front_lang_en', 'front_file_ar', 'front_file_en', 'warranty_file_ar', 'warranty_file_en', 'warranty_lang_ar', 'warranty_lang_en', 'smsWarranty_file_ar', 'smsWarranty_file_en', 'smsWarranty_lang_ar', 'smsWarranty_lang_en', 'insurance_file_ar', 'insurance_file_en', 'insurance_lang_ar', 'insurance_lang_en'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = $request->file;
        $newrep = "'" . $request->key . "' => '" . $request->va . "'";
        $oldrep = "'" . $request->key . "' => '" . $request->old . "'";
        echo file_put_contents($file, str_replace($oldrep, $newrep, file_get_contents($file)));
        echo "true";
    }

}
