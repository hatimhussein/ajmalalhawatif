<?php

namespace Modules\SkudoModule\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Modules\SkudoModule\Entities\SerialNumber;

class SerialNumbersImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithStartRow
{
    use Importable;

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $rowIndex => $row) {
            try {
                // تنظيف البيانات وإزالة المسافات الزائدة مع إصلاح الترميز
                $itemNumber = $this->cleanText($row['item_number'] ?? '');
                $barcode = $this->cleanText($row['barcode'] ?? '');
                $productNameAr = $this->cleanText($row['product_name_ar'] ?? '');
                $productNameEn = $this->cleanText($row['product_name_en'] ?? '');
                $productSerial = $this->cleanText($row['product_serial'] ?? '');
                
                // التحقق من وجود الرقم التسلسلي
                if (empty($productSerial)) {
                    continue; // تخطي الصفوف الفارغة
                }
                
                // التحقق من عدم وجود الرقم التسلسلي مسبقاً
                if (SerialNumber::where('product_serial', $productSerial)->exists()) {
                    continue; // تخطي الأرقام المكررة
                }
                
                SerialNumber::create([
                    'item_number' => !empty($itemNumber) ? $itemNumber : null,
                    'barcode' => !empty($barcode) ? $barcode : null,
                    'product_name_ar' => !empty($productNameAr) ? $productNameAr : null,
                    'product_name_en' => !empty($productNameEn) ? $productNameEn : null,
                    'product_serial' => $productSerial,
                ]);
            } catch (\Exception $e) {
                // تسجيل الخطأ والمتابعة
                \Log::error("خطأ في استيراد الصف " . ($rowIndex + 2) . ": " . $e->getMessage());
                continue;
            }
        }
    }

    /**
     * تنظيف النص وإصلاح الترميز
     */
    private function cleanText($text)
    {
        if (empty($text)) {
            return '';
        }
        
        // تحويل النص إلى UTF-8
        $text = trim($text);
        
        // إصلاح الترميز إذا كان معطوباً
        if (!mb_check_encoding($text, 'UTF-8')) {
            // محاولة تحويل من ترميزات مدعومة
            $encodings = ['ISO-8859-1', 'ASCII', 'Windows-1252'];
            foreach ($encodings as $encoding) {
                if (mb_check_encoding($text, $encoding)) {
                    $text = mb_convert_encoding($text, 'UTF-8', $encoding);
                    break;
                }
            }
            
            // إذا فشل التحويل، محاولة تحويل مباشر
            if (!mb_check_encoding($text, 'UTF-8')) {
                $text = mb_convert_encoding($text, 'UTF-8', 'auto');
            }
        }
        
        return $text;
    }

    /**
     * تحديد الصف الذي يبدأ منه القراءة
     */
    public function startRow(): int
    {
        return 2; // تخطي الصف الأول (العناوين)
    }


    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}
