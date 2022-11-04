<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Language;

class TranslateService
{
    public function translate(Request $request, $model)
    {
        $request->validate([
            "language_short" => 'required|exists:languages,short',
            "data" => "required|array",
            "data.*.column" => 'required',
            "data.*.value" => 'required'
        ]);

        $languageId = $this->getLanguageIdByName($request->language_short);

        DB::beginTransaction();
        try {
            $data = [
                "language_id" => $languageId,
            ];

            foreach ($request->data as $item) {
                $data[$item['column']] = $item['value'];
            }

            $model->translate()->create($data);

            DB::commit();

            return $model->load('translate');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function getLanguageIdByName($short)
    {
        $language = Language::where('short', $short)->firstOrFail();

        return $language->id;
    }
}
