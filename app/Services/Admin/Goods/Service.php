<?php

namespace App\Services\Admin\Goods;

use App\Models\Good;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Service
{
    public function store($data)
    {
        try {

            DB::beginTransaction();
            if (isset($data['on_off'])) {
                $data['on_off'] = true;
            } else {
                $data['on_off'] = false;
            }

            $data['image_main'] = Storage::disk('public')->put('/images', $data['image_main']);
            if (isset($data['image_0'])) {
                $data['image_0'] = Storage::disk('public')->put('/images', $data['image_0']);
            }
            if (isset($data['image_1'])) {
                $data['image_1'] = Storage::disk('public')->put('/images', $data['image_1']);
            }
            if (isset($data['image_2'])) {
                $data['image_2'] = Storage::disk('public')->put('/images', $data['image_2']);
            }
            if (isset($data['image_3'])) {
                $data['image_3'] = Storage::disk('public')->put('/images', $data['image_3']);
            }
            if (isset($data['image_4'])) {
                $data['image_4'] = Storage::disk('public')->put('/images', $data['image_4']);
            }
            if (isset($data['image_5'])) {
                $data['image_5'] = Storage::disk('public')->put('/images', $data['image_5']);
            }
            if (isset($data['image_6'])) {
                $data['image_6'] = Storage::disk('public')->put('/images', $data['image_6']);
            }
            if (isset($data['image_7'])) {
                $data['image_7'] = Storage::disk('public')->put('/images', $data['image_7']);
            }
            if (isset($data['image_8'])) {
                $data['image_8'] = Storage::disk('public')->put('/images', $data['image_8']);
            }
            if (isset($data['subcategories'])) {
                $sub = $data['subcategories'];
                unset($data['subcategories']);
            }

            $good = Good::create($data);
            if (isset($sub)) {
                $good->subcategories()->attach($sub);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

    }

    public function update($data, $good)
    {
        try {

            DB::beginTransaction();
            if (isset($data['on_off'])) {
                $data['on_off'] = true;
            } else {
                $data['on_off'] = false;
            }

            if(!isset($data['image_main'])) {
                $data['image_main'] = $good->image_main;
            }
            else {
                $data['image_main'] = Storage::disk('public')->put('/images', $data['image_main']);
                if (isset($good['image_main'])) {
                    Storage::disk('public')->delete($good->image_main);
                }

            }
            if(!isset($data['image_0'])) {
                $data['image_0'] = $good->image_0;
            }
            else {
                $data['image_0'] = Storage::disk('public')->put('/images', $data['image_0']);
                if (isset($good['image_0'])) {
                    Storage::disk('public')->delete($good->image_0);
                }
            }
            if(!isset($data['image_1'])) {
                $data['image_1'] = $good->image_1;
            }
            else {
                $data['image_1'] = Storage::disk('public')->put('/images', $data['image_1']);
                if (isset($good['image_1'])) {
                    Storage::disk('public')->delete($good->image_1);
                }
            }
            if(!isset($data['image_2'])) {
                $data['image_2'] = $good->image_2;
            }
            else {
                $data['image_2'] = Storage::disk('public')->put('/images', $data['image_2']);
                if (isset($good['image_2'])) {
                    Storage::disk('public')->delete($good->image_2);
                }
            }
            if(!isset($data['image_3'])) {
                $data['image_3'] = $good->image_3;
            }
            else {
                $data['image_3'] = Storage::disk('public')->put('/images', $data['image_3']);
                if (isset($good['image_3'])) {
                    Storage::disk('public')->delete($good->image_3);
                }
            }
            if(!isset($data['image_4'])) {
                $data['image_4'] = $good->image_4;
            }
            else {
                $data['image_4'] = Storage::disk('public')->put('/images', $data['image_4']);
                if (isset($good['image_4'])) {
                    Storage::disk('public')->delete($good->image_4);
                }
            }
            if(!isset($data['image_5'])) {
                $data['image_5'] = $good->image_5;
            }
            else {
                $data['image_5'] = Storage::disk('public')->put('/images', $data['image_5']);
                if (isset($good['image_5'])) {
                    Storage::disk('public')->delete($good->image_5);
                }
            }
            if(!isset($data['image_6'])) {
                $data['image_6'] = $good->image_6;
            }
            else {
                $data['image_6'] = Storage::disk('public')->put('/images', $data['image_6']);
                if (isset($good['image_6'])) {
                    Storage::disk('public')->delete($good->image_6);
                }
            }
            if(!isset($data['image_7'])) {
                $data['image_7'] = $good->image_7;
            }
            else {
                $data['image_7'] = Storage::disk('public')->put('/images', $data['image_7']);
                if (isset($good['image_7'])) {
                    Storage::disk('public')->delete($good->image_7);
                }
            }
            if(!isset($data['image_8'])) {
                $data['image_8'] = $good->image_8;
            }
            else {
                $data['image_8'] = Storage::disk('public')->put('/images', $data['image_8']);
                if (isset($good['image_8'])) {
                    Storage::disk('public')->delete($good->image_8);
                }
            }

            if (isset($data['subcategories']) || $data['subcategories'] == null) {
                $sub = $data['subcategories'];
                unset($data['subcategories']);
            }

            $good->update($data);

            if (isset($sub)) {
                $good->subcategories()->sync($sub);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }


}
