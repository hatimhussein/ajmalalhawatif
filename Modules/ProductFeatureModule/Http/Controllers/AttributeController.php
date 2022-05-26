<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductFeatureModule\Entities\Attribute;

class AttributeController extends Controller
{

    use ApiResponseHelper;

    public function __construct()
    {
        $this->middleware('is_admin');

        $this->middleware('permission:show_attribute')->only('index');
        $this->middleware('permission:add_attribute')->only('create');
        $this->middleware('permission:delete_attribute')->only('destroy');
        $this->middleware('permission:update_attribute')->only(['edit', 'update']);

    }


    public function index()
    {
        $attributes = Attribute::all();
        return view('productfeaturemodule::admin.attribute.index', compact('attributes'));
    }


    public function store(Request $request)
    {
        $attribute = Attribute::find($request->attribute_id);

        if (!$attribute) {
            Attribute::create($request->except('_token'));
            return redirect('admin/attribute')->with('success', 'success');
        } else {
            $attribute->update($request->except('_token'));
            return redirect('admin/attribute')->with('updated', 'updated');
        }

    }


    public function setAttribute(Request $request)
    {
        Attribute::create($request->except('_token'));
        $attributes = Attribute::all();
        return $this->setCode(200)->setData($attributes)->send();

    }

    public function destroy($id)
    {
        $option = Attribute::where('id', $id)->with('products')->first();

        if ($option->products->count() <= 0) {
            Attribute::destroy($id);
            return redirect('/admin/attribute')->with('deleted', 'deleted');
        }
        return redirect('/admin/attribute')->with('deleted', __('productfeaturemodule::admin.cant_delete_value'));

    }


    public function bulk(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:active,de-active,delete',
        ]);

        $ids = explode(',', $request->get('ids'));
        switch ($request->get('method')) {
            case 'active':
                $this->bulkStatus($ids, 1);
                break;
            case 'de-active':
                $this->bulkStatus($ids, 0);
                break;
            case 'delete':
                $failed = bulkDelete('attributes', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }

    public function bulkStatus($ids, $status)
    {
        return Attribute::whereIn('id', $ids)->update(['status' => $status]);
    }

    public function bulkDelete($ids): int
    {
        DB::statement("DELETE IGNORE FROM `attributes` WHERE `id` IN (?)", [$ids]);
        $warning = DB::select('SELECT @@warning_count as `warnings`');
        return $warning[0]->warnings ?? 0;
    }


}
