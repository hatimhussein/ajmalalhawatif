<?php

namespace Modules\SkudoModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\SkudoModule\Entities\SerialNumber;
use Modules\SkudoModule\Http\Requests\SerialNumberRequest;
use Modules\SkudoModule\Imports\SerialNumbersImport;
use Maatwebsite\Excel\Facades\Excel;

class SerialNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SerialNumber::query()->with(['insurance.warranties.currency']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        $serialNumbers = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('skudomodule::admin.serial-numbers.index', compact('serialNumbers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('skudomodule::admin.serial-numbers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param SerialNumberRequest $request
     * @return Response
     */
    public function store(SerialNumberRequest $request)
    {
        SerialNumber::create($request->validated());

        return redirect()->route('skudo.serial-numbers.index')
            ->with('success', 'تم إضافة الرقم التسلسلي بنجاح');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $serialNumber = SerialNumber::findOrFail($id);
        return view('skudomodule::admin.serial-numbers.show', compact('serialNumber'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $serialNumber = SerialNumber::findOrFail($id);
        return view('skudomodule::admin.serial-numbers.edit', compact('serialNumber'));
    }

    /**
     * Update the specified resource in storage.
     * @param SerialNumberRequest $request
     * @param int $id
     * @return Response
     */
    public function update(SerialNumberRequest $request, $id)
    {
        $serialNumber = SerialNumber::findOrFail($id);
        $serialNumber->update($request->validated());

        return redirect()->route('skudo.serial-numbers.index')
            ->with('success', 'تم تحديث الرقم التسلسلي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $serialNumber = SerialNumber::findOrFail($id);
        
        // التحقق من وجود علاقات قبل الحذف
        if ($serialNumber->insurance) {
            return redirect()->route('skudo.serial-numbers.index')
                ->with('error', 'لا يمكن حذف هذا الرقم التسلسلي لأنه مرتبط بتسجيل ضمان رقم #' . $serialNumber->insurance->id);
        }
        
        $serialNumber->delete();

        return redirect()->route('skudo.serial-numbers.index')
            ->with('success', 'تم حذف الرقم التسلسلي بنجاح');
    }

    /**
     * Search for serial number
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $serial = $request->get('serial');
        
        if (!$serial) {
            return response()->json([
                'success' => false,
                'message' => 'الرقم التسلسلي مطلوب'
            ]);
        }

        $serialNumber = SerialNumber::where('product_serial', $serial)->first();

        if ($serialNumber) {
            // التحقق من استخدام الرقم التسلسلي مسبقاً
            $existingInsurance = $serialNumber->insurance;
            
            if ($existingInsurance) {
                return response()->json([
                    'success' => false,
                    'message' => 'الرقم التسلسلي مستخدم مسبقاً في تسجيل ضمان رقم #' . $existingInsurance->id,
                    'is_used' => true,
                    'insurance_id' => $existingInsurance->id
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'product_name_ar' => $serialNumber->product_name_ar,
                    'barcode' => $serialNumber->barcode,
                    'item_number' => $serialNumber->item_number,
                    'product_name_en' => $serialNumber->product_name_en,
                    'serial_number_id' => $serialNumber->id
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'لم يتم العثور على الرقم التسلسلي'
        ]);
    }

    /**
     * Show the import form
     */
    public function import()
    {
        return view('skudomodule::admin.serial-numbers.import');
    }

    /**
     * Store the imported data
     */
    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240', // 10MB max
        ]);

        try {
            $import = new SerialNumbersImport;
            Excel::import($import, $request->file('file'));
            
            return redirect()->route('skudo.serial-numbers.index')
                ->with('success', 'تم استيراد البيانات بنجاح');
        } catch (\Exception $e) {
            \Log::error('Import error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء الاستيراد. تأكد من صحة تنسيق الملف والترميز.');
        }
    }
}
