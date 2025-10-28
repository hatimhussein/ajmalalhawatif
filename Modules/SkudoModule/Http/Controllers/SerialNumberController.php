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

        $serialNumbers = $query->orderBy('created_at', 'desc')->paginate(50);

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

    /**
     * Export serial numbers to CSV
     */
    public function export(Request $request)
    {
        $searchTerm = $request->get('search');
        
        try {
            return $this->exportAsCSV($searchTerm);
        } catch (\Exception $e) {
            \Log::error('Export error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تصدير البيانات: ' . $e->getMessage());
        }
    }
    
    /**
     * Export as CSV (fallback method for older PHP versions)
     */
    private function exportAsCSV($searchTerm)
    {
        $query = SerialNumber::query();
        
        if ($searchTerm) {
            $query->search($searchTerm);
        }
        
        $serialNumbers = $query->orderBy('created_at', 'desc')->get();
        
        $fileName = 'serial_numbers_' . date('Y-m-d_H-i-s') . '.csv';
        
        // Use temp directory instead
        $directory = storage_path('app');
        
        // Create directory if not exists
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        
        $filePath = $directory . '/' . $fileName;
        
        // Create CSV file
        $file = fopen($filePath, 'w');
        
        // Add UTF-8 BOM for proper Arabic display in Excel
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Headers
        fputcsv($file, array(
            '#',
            'رقم الصنف',
            'الباركود',
            'اسم الصنف (عربي)',
            'اسم الصنف (إنجليزي)',
            'الرقم التسلسلي',
            'تاريخ الإضافة',
            'رقم تسجيل الضمان',
            'حالة تسجيل الضمان',
            'رقم المطالبة',
            'حالة المطالبة',
            'قيمة التعويض',
            'رقم الاعتماد'
        ));
        
        $counter = 0;
        foreach ($serialNumbers as $serialNumber) {
            $counter++;
            
            $insuranceId = '-';
            $insuranceStatus = '-';
            $warrantyId = '-';
            $warrantyStatus = '-';
            $compensationValue = '-';
            $applicationNumber = '-';
            
            $insurance = $serialNumber->insurance;
            
            if ($insurance) {
                $insuranceId = $insurance->id;
                $status = $insurance->status;
                
                if ($status == 0) {
                    $insuranceStatus = 'جديد';
                } elseif ($status == 1) {
                    $insuranceStatus = 'مفعل';
                } elseif ($status == 2) {
                    $insuranceStatus = 'مرفوض';
                } elseif ($status == 3) {
                    $insuranceStatus = 'قيد المراجعة';
                }
                
                $warranties = $insurance->warranties;
                if ($warranties && $warranties->count() > 0) {
                    $latestWarranty = $warranties->sortByDesc('created_at')->first();
                    
                    if ($latestWarranty) {
                        $warrantyId = $latestWarranty->id;
                        
                        if ($latestWarranty->is_applicable == 1) {
                            $warrantyStatus = 'يشمل الضمان';
                        } elseif ($latestWarranty->is_applicable == 2) {
                            $warrantyStatus = 'معلق';
                        } elseif ($latestWarranty->is_applicable == null) {
                            $warrantyStatus = 'جديد';
                        } else {
                            $warrantyStatus = 'لا يشمل الضمان';
                        }
                        
                        if ($latestWarranty->value) {
                            $currencyCode = '';
                            if ($latestWarranty->currency && $latestWarranty->currency->code) {
                                $currencyCode = $latestWarranty->currency->code;
                            }
                            $compensationValue = number_format($latestWarranty->value, 2) . ' ' . $currencyCode;
                        }
                        
                        if ($latestWarranty->application_number) {
                            $applicationNumber = $latestWarranty->application_number;
                        }
                    }
                }
            }
            
            fputcsv($file, array(
                $counter,
                $serialNumber->item_number ? $serialNumber->item_number : '-',
                $serialNumber->barcode ? $serialNumber->barcode : '-',
                $serialNumber->product_name_ar ? $serialNumber->product_name_ar : '-',
                $serialNumber->product_name_en ? $serialNumber->product_name_en : '-',
                $serialNumber->product_serial ? $serialNumber->product_serial : '-',
                $serialNumber->formatted_created_at ? $serialNumber->formatted_created_at : '-',
                $insuranceId,
                $insuranceStatus,
                $warrantyId,
                $warrantyStatus,
                $compensationValue,
                $applicationNumber
            ));
        }
        
        fclose($file);
        
        // Download and delete after send
        if (file_exists($filePath)) {
            return response()->download($filePath, $fileName)->deleteFileAfterSend(true);
        }
        
        return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء ملف CSV.');
    }
}
